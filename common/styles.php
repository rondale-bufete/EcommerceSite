<?php
function homeStyles()
{

    echo ".logo {
            width: 70px;
            height: 70px;
        }
        
        body {
            overflow-x: hidden;
        }

        .card-img-top {
            width: 100%;
            height: 230px;
            object-fit: contain;
        }
        .login-btn {
            padding: 10px 20px;
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            transition: 200ms;
            font-weight: 700;
        }
        .login-btn:hover {
            background-color: #fff;
            border: 1px solid #ff523b;
            color: black;
            transition: 200ms;
        }
        .login-btn:active {
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            transform: translateY(2px);
            transition: 200ms;
        }
        .nav-btn {
            text-transform: uppercase;
            font-size: 16px;
        }
        .nav-btn:hover {
            color: #ff523b;
        }

        .active-nav {
            color: #ff523b;
            font-weight: 500;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #f5f6f7;
            -webkit-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
        }

        .search-bar {
            background-color: #fff;
            border: 1px solid #ccc;
            width: 80%;
            height: 47px;
            padding-left: 10px;          
            transition: 200ms;

        }
        .logout-btn {
            text-decoration: none;
            color: #ff523b;
            padding: 10px 5px;
            
        }
        .logout-btn:hover {
            color: red;
            font-weight: 500;
        }

        .search-bar:focus {
            outline: none;
            -webkit-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            transition: 200ms;

        }
        .search-button {
            border: 1px solid #ccc;
        }
        .search-button:hover {
            background-color: #ccc;
            color: black;
        }
        .cart-size {
            font-size: 1.5rem;
        }

        .home-header {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 65px;
            padding-top: 50px;
            padding-left: 100px;
        }

        .home-header .col-2 {
            padding-top: 25px;

        }

        .col-2 {
            flex-basis: 50%;
            min-width: 360px;
        }

        .column1 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .col-2 img {
            max-width: 100%;
            padding: 50px 0;
        }

        .col-2 h1 {
            font-size: 40px;
            line-height: 60px;
        }

        .list-bar:hover {
            background-color: #ff523b;
            transition: 0.5s;
            color: #fff;
        }

        .brand-head {
            border-bottom: 1px solid #ff523b;
        }

        .card {
            transition: 0.5s;
        }

        .card:hover {
            transform: translateY(-6px);
            transition: 0.5s;
        }

        .card-link {
            text-decoration: none;
        }

        .product-name {
            font-size: 1.1rem;
        }
    
        .card-button {
            display: flex;
            justify-content: right;
            align-items: end;

        }
        .card-button2 {
            display: flex;
            justify-content: right;
            align-items: end;
            margin-right: 15px;
        }
        .add-to-cart {
            text-decoration: none;
            text-transform: uppercase;
            color: #ff523b;
            font-weight: 700;
            padding: 7px 10px;
            border-radius: 6px;
            transition: 200ms;
            border: 1px solid #fff;
        }
        .add-to-cart2 {
            text-decoration: none;
            text-transform: uppercase;
            color: #ff523b;
            font-weight: 700;
            padding: 7px 10px;
            border-radius: 6px;
            transition: 200ms;
            margin-top: 20px;
            border: 1px solid #ff523b;
        }
        .add-to-cart:hover {
            border: 1px solid #ff523b;
            transition: 200ms;
        }
        .add-to-cart2:hover {
            border: 1px solid #ff523b;
            background-color: rgba(212, 25, 0);
            color: #fff;
            transition: 200ms;
        }
        .bordered-prd {
            border: 1px solid #ff523b;
        }


        .footer {
            background: #000;
            color: #8a8a8a;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 30px 45px 10px 45px;
        }
        .footer p {
            color: #8a8a8a;
            font-style: italic;
        }
        .footer h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-col-2, .footer-col-3, .footer-col-4 {
            min-width: 250px;
        }
        .footer-col-3, .footer-col-4 {
            margin-top: 20px;
            
        }
        .footer-col-1 {
            flex-basis: 33%;
        }
        .footer-col-2 {
            flex: 1;
            text-align: center; 
        }
        .footer-col-2 img{
            width: 110px;
            margin-bottom: 20px;
        }
        .footer-col-3, .footer-col-4 {
            flex-basis: 12%;
            text-align: center;
        }
        .footer a {
            cursor: pointer;
            text-decoration: none;
            color: #8a8a8a;
        }
        .footer a:hover {
            color: #ff4027;
        }
        .footer ul {
            list-style-type: none;
        }
        .footer ul li {
            text-align: left;

        }

        .footer hr {
            border: none;
            background: #ff523b;
            height: 1px;
            margin: 20px 0;
        }
        .copyright {
            text-align: right;
        }
        .bottom {
            justify-content: space-between;
        }

        .p-description {
            margin-right: 20px;
        }
        .v-space {
            margin-top: 20px;
        }

        @media only screen and (max-width: 600px) {
            .row {
                text-align: center;
            }
            .col-2, .col-3, .col-4 {
                flex-basis: 100%;
            }
            .single-product .row{
                text-align: left;
            }
            .single-product .col-2 {
                padding: 20px 0;
            }
            .single-product h1 {
                font-size: 24px;
                line-height: 32px;
            }
            .cart-info p {
                display: none;
            }
            .account-page .row img {
            display: none;
            }
            .prd {
                height: 210px;
                width: 190px;
            }
            .small-container .prd {
                width: 250px;
            }

            .products .col-4 .prd {
                width: 250px;
            }
            .contact h2 {
                font-size: 24px;
                color: #555;
            }
            .products h2{
                font-size: 24px;
                text-align: center;
            }
            .search-box input[type='text'] {
                padding: 8px;
                border: 1px solid #ccc;
                height: 25px;
                border-radius: 4px;
                width: 250px;
                margin-right: 5px;
            }
            
            .search-box button {
                padding: 13px;
                background: none;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .search-box img {
                height: 15px;
                width: 15px;
            }
            .logo img {
                width: 75px;
                height: 75px;
            }
            .footer-col-2 img {
                width: 100px;
            }

            .contact-container {
                width: 300px;
            }
            .contact-container input,
            .contact-container textarea {
                width: 80%;
                height: 45px;  
            }
            .socials img {
                width: 50px;
                height: 50px;
            }
        }
        @media only screen and (max-width: 400px) {
            .row {
                text-align: center;
            }
            .col-2, .col-3, .col-4 {
                flex-basis: 100%;
            }
            .single-product .row{
                text-align: left;
            }
            .single-product .col-2 {
                padding: 20px 0;
                margin: auto;
            }
            .single-product h1 {
                font-size: 20px;
                line-height: 32px;
            }
            
            .single-product li {
                font-size: 14px;
            }
            .single-product p {
                font-size: 14px;
            }
            .cart-info p {
                display: none;
            }
            .prd {
                height: 210px;
                width: 190px;
            }
            .small-container .prd {
                width: 250px;
            }
            .products .col-4 .prd {
                width: 250px;
            }
            .contact h2 {
                font-size: 24px;
                color: #555;
            }
            .products h2{
                font-size: 24px;
                text-align: center;
            }
            .search-box input[type='text'] {
                padding: 8px;
                border: 1px solid #ccc;
                height: 25px;
                border-radius: 4px;
                width: 250px;
                margin-right: 5px;
            }
            
            .search-box button {
                padding: 13px;
                background: none;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .search-box img {
                height: 15px;
                width: 15px;
            }
            .logo img {
                width: 75px;
                height: 75px;
            }
            .footer-col-2 img {
                width: 100px;
            }

            .contact-container {
                width: 300px;
            }
            .contact-container input,
            .contact-container textarea {
                width: 80%;
                height: 45px;  
            }
            .socials img {
                width: 50px;
                height: 50px;
            }
        }
        ";
};

function cartStyles()
{
    echo "
        .cart-page { 
            margin-top: 50px;
            height: 55vh;
        }
        .small-container {
            max-width: 1080px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
        }
        .cart-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-info {
            display: flex;
            flex-wrap: wrap;
        }
        .cart-info p {
            text-align: left;
        }
        .cart-info a:hover {
            color: #891506;
        }

        th {
            text-align: center;
            padding: 5px;
            color: #fff;
            font-weight: bold;
            background-color: rgba(254, 82, 35, 0.9);
            border-bottom: 2px solid #ff4027;
            text-transform: uppercase;
            height: 45px;
        }
        td {
            padding: 10px 5px;
        }
        td input {
            width: 40px;
            height: 30px;
            padding: 5px;
        }
        td a {
            color: #ff523b;
            font-size: 12px;
        }
        td img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }
        .total-price {
            margin-right: 25px;
            display: flex;
            justify-content: flex-end;
        }
        .total-price table {
            border-top: 2px solid #ff4027;
            width: 100%;
            max-width: 400px;
        }
        .total-price .btn {
            border-radius: 5px;
            border: none;
            cursor: pointer;
            padding: 15px 25px;
        }
        .total-price td:last-child {
            text-align: right;
        }
        .total-price td {
            font-size: 24;
        }
    
        input[type='checkbox'] {
            width: 20px;
            height: 20px; 
            border: 2px solid #aaa; 
            background-color: #fff; 
            cursor: pointer;
        }
        .checkout-btn a{
            text-decoration: none;
            color: #fff;
        }
        .checkout-btn {
            background-color: #ff4027;
            padding: 10px;
        }
        .checkout-btn:active {
           transform: translateY(1px);
        }
        .remove-btn {
            color: #ff4027;
            border: 1px solid #ff4027;
        }
        .remove-btn:hover {
            color: #fff;
            background-color: #780e00;
            border: 1px solid #780e00;
        }

    ";
}


function productInsertStyles()
{
    echo "

        .form-input {
            width: 80%;
        }

        .data-input {
            height: 45px;
            margin-bottom: 15px;
            width: 100%;
            background-color: fff;
            padding-left: 15px;
            padding-right: 10px;
            border: none;
            border-bottom: 1px solid #555;
            border-radius: 5px;
            transition: 100ms;
            
        }

        .data-input:focus {
            outline: none;
            border-bottom: 1px solid #ff523b;
            transition: 100ms;
            transform: translateY(-1px);
           
        }

        .image-input {
            margin-bottom: 15px;
            border: none;
            border-bottom: 5px solid #555;
            border-radius: 5px;
            
        }

        form {
            padding: 15px;
            background-color: #f5f6f7;
        }

        .btn-contain {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 17px;
        }

        .button-sub {
            width: 50%;
        }";
}

function adminStyles()
{
    echo "
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .contain-bg {
            background-color: #f0f0f0;
        }

        .nav-main {
            padding-bottom: 20px;
            -webkit-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
            box-shadow: 0px 4px 9px -3px rgba(0, 0, 0, 0.33);
        }

        .nav-right {
            display: flex;
        }

        .admin-logout {
            padding: 0.5rem 0.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bolder;
            border: 2px solid #780101;
            color: #780101;
            margin-left: 20px;
            margin-right: 10px;
            transition: 100ms;
        }

        .admin-logout:hover {
            background-color: #780101;
            color: #fff;
            transition: 100ms;
        }

        .admin-logout:active {
            font-weight: bold;
            border-color: #fff;

            color: #fff;
        }

        .head {
            margin-top: 25px;
        }

        .logo {
            width: 70px;
            height: 70px;
            margin-left: 20px
        }

        .col-2 {
            padding: 7vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .admin-image {
            width: 50px;
            margin: auto;
            object-fit: contain;
        }

        .sub-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .admin-buttons {
            padding: 0.6rem 0.5rem;
            border-radius: 5px;
            text-decoration: none;
            background-color: #ccc;
            color: #000;
            margin: 2px;
            transition: 100ms;
        }

        .admin-buttons:hover {
            background-color: #000;
            color: #fff;
            border-color: #fff;
            transition: 100ms;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .footer {
            background: #000;
            color: #8a8a8a;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 30px 45px 10px 45px;
        }
        .footer p {
            color: #8a8a8a;
            font-style: italic;
        }
        .footer h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-col-2, .footer-col-3, .footer-col-4 {
            min-width: 250px;
        }
        .footer-col-3, .footer-col-4 {
            margin-top: 20px;
            
        }
        .footer-col-1 {
            flex-basis: 33%;
        }
        .footer-col-2 {
            flex: 1;
            text-align: center; 
        }
        .footer-col-2 img{
            width: 110px;
            margin-bottom: 20px;
        }
        .footer-col-3, .footer-col-4 {
            flex-basis: 12%;
            text-align: center;
        }
        .footer a {
            cursor: pointer;
            text-decoration: none;
            color: #8a8a8a;
        }
        .footer a:hover {
            color: #ff4027;
        }
        .footer ul {
            list-style-type: none;
        }
        .footer ul li {
            text-align: left;

        }

        .footer hr {
            border: none;
            background: #ff523b;
            height: 1px;
            margin: 20px 0;
        }
        .copyright {
            text-align: right;
        }
    
    
    ";
}


function registrationStyles()
{
    echo "
        .login-btn {
            padding: 10px 20px;
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            text-decoration: none;
            border-radius: 15px;
            transition: 200ms;
            font-weight: 700;
        }
        .login-btn:hover {
            background-color: #fff;
            border: 1px solid #ff523b;
            color: black;
            transition: 200ms;
        }
        .login-btn:active {
            background-color: #ff523b;
            border: 1px solid #ff523b;
            color: white;
            transform: translateY(2px);
            transition: 200ms;
        }
        .account-page {
            width: 100%;
            margin-top: 100px;
            padding: 50px 0;
            background-color: #f0f0f0;
        }
    
        .account-page .row img {
            height: 650px;
            object-fit: contain;
        }
        input:focus {
            outline: none;
        }
        input[type='file'] {
            height: 37px;
            cursor: pointer;
            padding: 5px;
        }
        .form-container {
            background: rgba(255,255,255,0.9);
            width: 400px;
            height: 700px;
            position: relative;
            text-align: center;
            padding: 35px 0;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            border-radius: 5px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            transition: 500ms;
        }
        .form-container span {
            font-weight: bold;
            padding: 0 10px;
            color: #555;
            cursor: pointer;
            width: 100px;
            display: inline-block;
        }
        .form-btn {
            display: inline-block;
        }
        .form-container form {
            max-width: 730px;
            padding: 0 20px;
            position: absolute;
            top: 100px;
            transition: transform 1s;
        }
        form input {
            width: 80%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        #LoginForm input {
            width: 65%;
        }
        #RegForm input {
            width: 90%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        #RegForm input:focus {
            border-bottom: 2px solid #ff523b;
        }
        input:focus {
            border-bottom: 2px solid #ff523b;
        }
        form .btn {
            width: 80%;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
            margin: 10px 0;
        }
        form .btn:focus {
            outline: none;
        }
        #LoginForm {
            left: -765px;
        }
        #LoginForm .btn {
            width: 55%;
        }
        #RegForm {
            left: 0;
        }
        form a {
            font-size: 12px;
            text-decoration: none;
        }
        form a:hover {
            color: #ff4027;
        }
        #Indicator {
            width: 100px;
            border: none;
            background-color: #ff523b;
            height: 3px;
            margin-top: 8px;
            transform: translateX(100px);
            transition: transform 1s;
        }
        
        .btn {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 10px;
            transition: background 5ms;
        }
        .btn:hover {
            background: #563434;
            color: #fff;
        }

        input[type='file'] {
            display: none;
        }

        .custom-file-input {
            margin: auto;
            border: none;
            height: 50px;
            margin-top: 5px;
            width: 90%;
            border-bottom: 1px solid #00000074;
            cursor: pointer;
            text-align: left;
            padding-top: 7px;
            color: rgbs(239, 239, 240, 0.5);
        }
        .custom-file-input-text p{
            font-size: 11px;
            width: 100%;
            color: rgbs(239, 239, 240, 0.5);
            white-space: nowrap; 
        }
        .custom-file-input:hover {
           
            border-bottom: 1px solid #ff523b;
            .custom-file-input-text {
                color: #ff523b;
            }
        }
        .custom-file-input:focus {
            border-bottom: 1px solid #ff523b;
        }



        .footer {
            background: #000;
            color: #8a8a8a;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 30px 45px 10px 45px;
        }
        .footer p {
            color: #8a8a8a;
            font-style: italic;
        }
        .footer h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-col-2, .footer-col-3, .footer-col-4 {
            min-width: 250px;
        }
        .footer-col-3, .footer-col-4 {
            margin-top: 20px;
            
        }
        .footer-col-1 {
            flex-basis: 33%;
        }
        .footer-col-2 {
            flex: 1;
            text-align: center; 
        }
        .footer-col-2 img{
            width: 110px;
            margin-bottom: 20px;
        }
        .footer-col-3, .footer-col-4 {
            flex-basis: 12%;
            text-align: center;
        }
        .footer a {
            cursor: pointer;
            text-decoration: none;
            color: #8a8a8a;
        }
        .footer a:hover {
            color: #ff4027;
        }
        .footer ul {
            list-style-type: none;
        }
        .footer ul li {
            text-align: left;

        }

        .footer hr {
            border: none;
            background: #ff523b;
            height: 1px;
            margin: 20px 0;
        }
        .copyright {
            text-align: right;
        }
        .login-btn a {
            font-size: 24px;
        }
    ";
}
function loginStyle()
{
    echo "
        .account-page {
            width: 100%;
            margin-top: 100px;
            padding: 50px 0;
            background-color: #f0f0f0;
        }
    
        .account-page .row img {
            height: 650px;
            object-fit: contain;
        }
        input:focus {
            outline: none;
        }
        input[type='file'] {
            height: 37px;
            cursor: pointer;
            padding: 5px;
        }
        .form-container {
            background: rgba(255,255,255,0.9);
            width: 400px;
            max-height: 700px;
            min-height: 400px;
            position: relative;
            text-align: center;
            padding: 35px 0;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            border-radius: 5px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            transition: 500ms;
        }
        .form-container span {
            font-weight: bold;
            padding: 0 10px;
            color: #555;
            cursor: pointer;
            width: 100px;
            display: inline-block;
        }
        .form-btn {
            display: inline-block;
        }
        .form-container form {
            max-width: 730px;
            padding: 0 20px;
            position: absolute;
            top: 100px;
            transition: transform 1s;
        }
        form input {
            width: 80%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        form div {
            margin: auto;
        }

        #RegForm input {
            width: 90%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        #RegForm input:focus {
            border-bottom: 2px solid #ff523b;
        }
        input:focus {
            border-bottom: 2px solid #ff523b;
        }
        form .btn {
            width: 80%;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
            margin: 10px 0;
        }
        form .btn:focus {
            outline: none;
        }
        #LoginForm {
            left: 0;
        }
        #RegForm {
            left: 700px;
        }
        form a {
            font-size: 12px;
            text-decoration: none;
        }
        form a:hover {
            color: #ff4027;
        }
        #Indicator {
            width: 100px;
            border: none;
            background-color: #ff523b;
            height: 3px;
            margin-top: 8px;
            transform: translateX(0px);
            transition: transform 1s;
        }
        
        .btn {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 10px;
            transition: background 5ms;
        }
        .btn:hover {
            background: #563434;
            color: #fff;
        }
        input[type='file'] {
            display: none;
        }

        .custom-file-input {
            margin: auto;
            border: none;
            height: 40px;
            margin-top: 5px;
            width: 90%;
            border-bottom: 1px solid #00000074;
            cursor: pointer;
            text-align: left;
            padding-top: 7px;
            color: rgbs(239, 239, 240, 0.5);
        }
        .custom-file-input-text p{
            font-size: 11px;
            width: 100%;
            color: rgbs(239, 239, 240, 0.5);
            white-space: nowrap; 
        }
        .custom-file-input:hover {
           
            border-bottom: 1px solid #ff523b;
            .custom-file-input-text {
                color: #ff523b;
            }
        }
        .custom-file-input:focus {
            border-bottom: 1px solid #ff523b;
        }



        .footer {
            background: #000;
            color: #8a8a8a;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 30px 45px 10px 45px;
        }
        .footer p {
            color: #8a8a8a;
            font-style: italic;
        }
        .footer h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-col-2, .footer-col-3, .footer-col-4 {
            min-width: 250px;
        }
        .footer-col-3, .footer-col-4 {
            margin-top: 20px;
            
        }
        .footer-col-1 {
            flex-basis: 33%;
        }
        .footer-col-2 {
            flex: 1;
            text-align: center; 
        }
        .footer-col-2 img{
            width: 110px;
            margin-bottom: 20px;
        }
        .footer-col-3, .footer-col-4 {
            flex-basis: 12%;
            text-align: center;
        }
        .footer a {
            cursor: pointer;
            text-decoration: none;
            color: #8a8a8a;
        }
        .footer a:hover {
            color: #ff4027;
        }
        .footer ul {
            list-style-type: none;
        }
        .footer ul li {
            text-align: left;

        }

        .footer hr {
            border: none;
            background: #ff523b;
            height: 1px;
            margin: 20px 0;
        }
        .copyright {
            text-align: right;
        }
    
    ";
}

function incLoginStyle()
{
    echo "
        .account-page {
            width: 100%;
            margin-top: 100px;
            padding: 50px 0;
            background-color: #f0f0f0;
        }
    
        .account-page .row img {
            height: 650px;
            object-fit: contain;
        }
        input:focus {
            outline: none;
        }
        input[type='file'] {
            height: 37px;
            cursor: pointer;
            padding: 5px;
        }
        .form-container {
            background: rgba(255,255,255,0.9);
            width: 400px;
            max-height: 700px;
            min-height: 400px;
            position: relative;
            text-align: center;
            padding: 35px 0;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            border-radius: 5px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            transition: 500ms;
        }
        .form-container span {
            font-weight: bold;
            padding: 0 10px;
            color: #555;
            cursor: pointer;
            width: 100px;
            display: inline-block;
        }
        .form-btn {
            display: inline-block;
        }
        .form-container form {
            max-width: 730px;
            padding: 0 20px;
            position: absolute;
            top: 100px;
            transition: transform 1s;
        }
        form input {
            width: 80%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        #RegForm input {
            width: 90%;
            height: 45px;
            margin: 10px 0;
            padding: 0 10px;
            background-color: rgba(255,255,255,0.5);
            border: none;
            border-bottom: 1px solid #00000074;
        }
        #RegForm input:focus {
            border-bottom: 2px solid #ff523b;
        }
        input:focus {
            border-bottom: 2px solid #ff523b;
        }
        form .btn {
            width: 80%;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
            margin: 10px 0;
        }
        form .btn:focus {
            outline: none;
        }
        #LoginForm {
            left: 0;
        }
        #RegForm {
            left: 700px;
        }
        form a {
            font-size: 12px;
            text-decoration: none;
        }
        form a:hover {
            color: #ff4027;
        }
        #Indicator {
            width: 100px;
            border: none;
            background-color: #ff523b;
            height: 3px;
            margin-top: 8px;
            transform: translateX(0px);
            transition: transform 1s;
        }
        
        .btn {
            display: inline-block;
            background: #ff523b;
            color: #fff;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 10px;
            transition: background 5ms;
        }
        .btn:hover {
            background: #563434;
            color: #fff;
        }
        input[type='file'] {
            display: none;
        }

        .custom-file-input {
            margin: auto;
            border: none;
            height: 40px;
            margin-top: 5px;
            width: 90%;
            border-bottom: 1px solid #00000074;
            cursor: pointer;
            text-align: left;
            padding-top: 7px;
            color: rgbs(239, 239, 240, 0.5);
        }
        .custom-file-input-text p{
            font-size: 11px;
            width: 100%;
            color: rgbs(239, 239, 240, 0.5);
            white-space: nowrap; 
        }
        .custom-file-input:hover {
           
            border-bottom: 1px solid #ff523b;
            .custom-file-input-text {
                color: #ff523b;
            }
        }
        .custom-file-input:focus {
            border-bottom: 1px solid #ff523b;
        }
";
}

function footerStyles()
{
    echo
    "
        .footer {
            background: #000;
            color: #8a8a8a;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            padding: 30px 45px 10px 45px;
        }
        .footer p {
            color: #8a8a8a;
            font-style: italic;
        }
        .footer h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-col-2, .footer-col-3, .footer-col-4 {
            min-width: 250px;
        }
        .footer-col-3, .footer-col-4 {
            margin-top: 20px;
            
        }
        .footer-col-1 {
            flex-basis: 33%;
        }
        .footer-col-2 {
            flex: 1;
            text-align: center; 
        }
        .footer-col-2 img{
            width: 110px;
            margin-bottom: 20px;
        }
        .footer-col-3, .footer-col-4 {
            flex-basis: 12%;
            text-align: center;
        }
        .footer a {
            cursor: pointer;
            text-decoration: none;
            color: #8a8a8a;
        }
        .footer a:hover {
            color: #ff4027;
        }
        .footer ul {
            list-style-type: none;
        }
        .footer ul li {
            text-align: left;

        }

        .footer hr {
            border: none;
            background: #ff523b;
            height: 1px;
            margin: 20px 0;
        }
        .copyright {
            text-align: right;
        }

    
    ";
}

function adminTableStyles() {
    echo "

        .table-products {
            width: 80px;
            height: 80px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        

        th {
            text-align: center;
            padding: 5px;
            color: #fff;
            font-weight: bold;
            background-color: #555;
            border-bottom: 2px solid #000;
            text-transform: uppercase;
            height: 45px;
        }
        td {
            padding: 10px 5px;
            border-bottom: 1px solid #ccc;
        }
        td a {
            color: #ff523b;
            font-size: 12px;
        }
        
        .icon-size {
            font-size: 1.2rem;
        }
    
    ";
}