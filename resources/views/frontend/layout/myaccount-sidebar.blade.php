{{-- style for my account page --}}
<style>
    .pt-90 {
        padding-top: 90px !important;
    }

    .pr-6px {
        padding-right: 6px;
        text-transform: uppercase;
    }

    .my-account .page-title {
        font-size: 1.5rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 40px;
        border-bottom: 1px solid;
        padding-bottom: 13px;
    }

    .my-account .wg-box {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        padding: 24px;
        flex-direction: column;
        gap: 24px;
        border-radius: 12px;
        background: var(--White);
        box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .bg-success {
        background-color: #40c710 !important;
    }

    .bg-danger {
        background-color: #f44032 !important;
    }

    .bg-warning {
        background-color: #f5d700 !important;
        color: #000;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;

    }

    .table-transaction th,
    .table-transaction td {
        padding: 0.625rem 1.5rem .25rem !important;
        color: #000 !important;
    }

    .table> :not(caption)>tr>th {
        padding: 0.625rem 1.5rem .25rem !important;
        background-color: #6a6e51 !important;
    }

    .table-bordered>:not(caption)>*>* {
        border-width: inherit;
        line-height: 32px;
        font-size: 14px;
        border: 1px solid #e1e1e1;
        vertical-align: middle;
    }

    .table-striped .image {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-striped td:nth-child(1) {
        min-width: 250px;
        padding-bottom: 7px;
    }

    .pname {
        display: flex;
        gap: 13px;
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
        border-width: 1px 1px;
        border-color: #6a6e51;
    }
</style>
{{-- my account page side bar --}}
<ul class="account-nav">
    <li><a href="{{route('myaccount')}}" class="menu-link menu-link_us-s">Dashboard</a></li>
    <li><a href="{{route('orders')}}" class="menu-link menu-link_us-s">Orders</a></li>
    <li><a href="{{route('orders_details')}}" class="menu-link menu-link_us-s">Orders Details</a></li>
    <li><a href="{{route('addresses')}}" class="menu-link menu-link_us-s">Addresses</a></li>
    <li><a href="add_address" class="menu-link menu-link_us-s">Add Addresses</a></li>
    <li><a href="{{route('account_details')}}" class="menu-link menu-link_us-s">Account Details</a></li>
    <li><a href="{{route('watchlist')}}" class="menu-link menu-link_us-s">Wishlist</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                class="menu-link menu-link_us-s">
                Log Out
            </a>
        </form>
    </li>
</ul>