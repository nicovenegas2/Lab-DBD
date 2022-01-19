<?php
    try {
        $nickname = $_COOKIE["usuario"];
        $show = "";
        $notshow = "d-none";
        $atribute = "";
    } catch (Exception $e){
        $atribute ="disabled";
        $show = "d-none";
        $notshow = "";
    }
    ?>

<button type="button" class="btn btn-primary position-fixed position-relative bottom-0 end-0 my-2 mx-5 {{$show}}" >
    <a href="/inbox" class="text-light h-100 w-100 text-decoration-none">Mails</a><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><span
            class="visually-hidden">unread messages</span></span>
</button>