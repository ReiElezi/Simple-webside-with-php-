<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eoI6ipmBxpk+H6at3Bz8nsg+jjgY5bAsx9+5BxJ+44TftBQ8q4v+dyFLN8txI6MK" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('/laragon/www/atc_project/components/nav.php') ?>
    <div class="container mt-4">
        <h1 class="ss"><b>Team</b></h1>
        <div class="team-content">
            <p class="fontSize13">
                <b>Kombëtarja e futbollit e Shqipërisë është ekipi kombëtar i futbollit
                    përfaqësues i Shqipërisë në arenën ndërkombëtare. Disa pikë kyçe rreth Kombëtares së Shqipërisë në
                    futboll janë:

                    Themelimi dhe Historia: Kombëtarja e futbollit e Shqipërisë u themelua në vitin 1930 dhe është një nga
                    ekipet që ka një histori të gjatë në futboll. Për vite të tëra, ka luajtur në garat ndërkombëtare të
                    futbollit.

                    Përfaqësimi Ndërkombëtar: Kombëtarja shqiptare ka luajtur në disa turne të rëndësishme, duke përfshirë
                    Kampionatin Evropian të Futbollit (EURO) dhe Kupën e Botës së FIFA-s. Një nga momentet më të rëndësishme
                    ishte pjesëmarrja në Kampionatin Evropian të Futbollit në vitin 2016, ku arriti të kualifikohet për herë
                    të parë në historinë e saj.

                    Lojtarë të Shquar: Për vite të tëra, Kombëtarja shqiptare ka përfshirë lojtarë të talentuar dhe të
                    njohur në arenën ndërkombëtare të futbollit. Disa lojtarë të shquar kanë qenë legjendat e futbollit
                    shqiptar.

                    Përparësitë dhe Sfidat: Përfaqësuesja ka pasur momente të ndritshme, por edhe sfida të vështira në
                    rrugën e saj drejt suksesit. Përpjekjet janë përqendruar në përmirësimin e paraqitjeve dhe në rritjen e
                    performancës në garat ndërkombëtare.

                    Përkrahja e Tifozëve: Tifozëria shqiptare ka qenë gjithmonë një faktor i rëndësishëm në këndvështrimin e
                    suksesit të Kombëtares së Shqipërisë. Përkrahja e pasionuar nga tifozët është një nga elementët kryesorë
                    që ka motivuar skuadrën.

                    Kombëtarja e Shqipërisë ka një histori të pasur në futbollin ndërkombëtar dhe vazhdon të luajë në gara
                    të ndryshme për të përfaqësuar vendin në skenën e futbollit botëror.</b></p>
        </div>
        <button id="btn" class="btn btn-primary mt-auto" onclick="toggleContent()">Read More</button>
    </div>

    <div class=" rowpic">
        <div class=" d-lg-flex d-md-flex justify-content-lg-center">
            <div class="col-md-2 photo-container">
                <img src="img/tifo1.jpg" alt="Photo 1">
                <p class="q"> Alb 2-0 Pol</p>
            </div>
            <div class="col-md-2 photo-container">
                <img src="img/tifo2.jpg" alt="Photo 2">
                <p class="q">Alb 3-0 Cze</p>
            </div>
            <div class="col-md-2 photo-container">
                <img src="img/tifo3.jpg" alt="Photo 3">
                <p class="q">Alb 2-1 Ifo</p>
            </div>
            <div class="col-md-2 photo-container">
                <img src="img/tifo4.jpg" alt="Photo 4">
                <p class="q">Alb 2-0 Mol</p>
            </div>
            <div class="col-md-2 photo-container">
                <img src="img/tifo5.webp" alt="Photo 5">
                <p class="q">Alb 0-0 Cze</p>
            </div>
        </div>
    </div>

    <?php include('/laragon/www/atc_project/components/footer.php') ?>
</body>

</html>

<script>
    function toggleContent() {
        let teamContent = document.querySelector('.team-content');
        if (teamContent.style.display === 'none' || teamContent.style.display === '') {
            teamContent.style.display = 'block';
        } else {
            teamContent.style.display = 'none';
        }
    }
</script>