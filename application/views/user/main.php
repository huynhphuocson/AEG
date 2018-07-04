<html>
<head>
    <?php $this->load->view('user/head')?>
</head>

<body>
    <!--load header-->
    <header class="group_header">
        <?php $this->load->view('user/header/index',$temp , $this->data)?>
    </header>
    <div class="main">

        <!--load block Ielts-->
        <?php $this->load->view('user/blockIelts/index',$temp , $this->data)?>

        <!--block why chose AEG-->
        <?php $this->load->view('user/blockwhychoseAEG/index',$temp , $this->data)?>

        <!--block share-->
        <?php $this->load->view($temp, $this->data)?>

        <!--block register & promotion-->
        <?php $this->load->view('user/blockREG&PRO/index',$temp , $this->data)?>

        <!--footer-->
        <?php $this->load->view('user/footer/index',$temp , $this->data)?>
    </div>

<?php $this->load->view('user/js')?>
</body>
</html>