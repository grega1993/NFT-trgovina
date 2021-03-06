<?php
    include_once "header.php";
    include_once "database.php";
    adminOnly();

    $id = (int) $_GET['id'];
    $query = "SELECT * FROM nft WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    if($stmt->rowCount() != 1){
        header("Location: index.php");
        die();
    }

    $crypto = $stmt->fetch();

?>
<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Uredi NFT</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form action="nft_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name = "id" value="<?php echo $crypto['id'];?>">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Ime</label>
                            <input class="form-control" type="text" name="title" placeholder="Vnesite ime"
                                required="required" value="<?php echo $crypto['title'];?>" /> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Opis</label>
                            <textarea class="form-control" rows="5" placeholder="Vnesite opis" name="description"><?php echo $crypto['description'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Cena(???)</label>
                            <input class="form-control" type="text" name="current_price" placeholder="Vnesite ceno" value="<?php echo $crypto['current_price'];?>"/> <br />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Logo</label>
                            <input class="form-control" type="file" name="logo" placeholder="Vnesite logotip"  /> <br />
                        </div>
                    </div>
                    <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Shrani</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    include_once "footer.php";
?>