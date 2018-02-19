<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    form {
        font-weight: bold;
        font-size: 1.2em;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        /*margin-top: 50px;*/
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .tableau tr, td, th {
        text-align: center;
    }

    .tableau tr, td {
        font-weight: normal;
        font-size: 1.1em;
    }

    .tableau td {
        width: 50%;
    }

    .tableau th {
        font-weight: bold;
        font-size: 1.3em;
    }

    .menu {
        font-weight: bold;
        font-size: 1.2em;
    }

    .tableauSales td {
        width: 15%;
    }

    .tableRecette td {
        width: 33%;
    }

    .table-editBoissons td {
        width: 33%;
    }

    .tableSugar tr, td, th {
        width: auto;
        align-items: center;
        justify-content: center;
    }

    .table-boissons tr, td, th {
        width: 33%;
        font-size: 1.2em;
        align-items: center;
        justify-content: center;
    }

    .search-table {
        font-size: 1.15em;
    }

    /*    .login{
            margin-top: 100px;
        }*/

    .ventes {
        margin-top: 2000px;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>