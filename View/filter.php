<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="<?php echo $this->src; ?>css/styles.css" rel="stylesheet" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">var baseController = <?php echo $this->baseController; ?>;</script>
        <script type="text/javascript">var ids = <?php echo $ids; ?>;</script>
        <script type="text/javascript" src="<?php echo $this->src; ?>jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->src; ?>js/script.js"></script>
    </head>
    <body>
        <div class="mainContainer">
            <div class="containerFilter">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="filterBlock">
                        <input class="filterButton" type="button" name="search" id="search" value="Найти по ID" />
                    </div>

                    <div class="filterBlock">
                        <select class="filterSelect" name="show" id="show">
                            <option disabled="disabled" selected="selected">Перейти к новости</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="containerFilter"></div>
            <div class="containerFilter">
                <div class="filterBlock">
                    <select class="filterSelect" name="number" id="number">
                        <option disabled="disabled" selected="selected">Длина списка</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="filterBlock">
                    <input class="filterButton" type="button" name="exit" id="exit" value="Перейти к списку" />
                </div>
            </div>
        </div>
        <div style="clear: both;">
    </body>
</html>
