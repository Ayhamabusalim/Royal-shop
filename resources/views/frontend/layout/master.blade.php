<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <title>Surfside Media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <link rel="shortcut icon" href="{{asset('assets/images/favicon2.png')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</head>


<body class="gradient-bg">
    @include('frontend.layout.navbar')

    @yield('main')

    <hr class="mt-5 text-secondary" />

    @include('frontend.layout.footer')
    <div id="scrollTop" class="visually-hidden end-0"></div>
    <div class="page-overlay"></div>

    <script src="{{asset('assets/js/plugins/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/countdown.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Create toast container if it doesn't exist
            let toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            toastContainer.style.position = 'fixed';
            toastContainer.style.top = '20px';
            toastContainer.style.right = '20px';
            toastContainer.style.zIndex = '9999';
            toastContainer.style.display = 'flex';
            toastContainer.style.flexDirection = 'column';
            toastContainer.style.gap = '10px';
            document.body.appendChild(toastContainer);

            function showToast(message, duration = 3000) {
                const toast = document.createElement('div');
                toast.innerText = message;
                toast.style.background = 'rgba(0, 0, 0, 0.8)';
                toast.style.color = '#fff';
                toast.style.padding = '12px 20px';
                toast.style.borderRadius = '8px';
                toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.3)';
                toast.style.fontSize = '14px';
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

                toastContainer.appendChild(toast);

                // Animate in
                requestAnimationFrame(() => {
                    toast.style.opacity = '1';
                    toast.style.transform = 'translateX(0)';
                });

                // Remove after duration
                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateX(100%)';
                    toast.addEventListener('transitionend', () => {
                        toast.remove();
                    });
                }, duration);
            }

            document.querySelectorAll(".js-add-cart").forEach((button) => {
                button.addEventListener("click", function () {
                    const productId = this.getAttribute("data-product-id");

                    fetch("{{ route('cart.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: JSON.stringify({ product_id: productId }),
                    })
                        .then((res) => res.json())
                        .then((data) => {
                            showToast(data.message || "Added to cart");

                            // Update cart count badge if available
                            if (data.count !== undefined) {
                                document.querySelector('.cart-count-badge').innerText = data.count;
                            }
                        })
                        .catch((err) => {
                            console.error(err);
                            showToast("Failed to add product to cart", 4000);
                        });
                });
            });
        });


    </script>



</body>

</html>