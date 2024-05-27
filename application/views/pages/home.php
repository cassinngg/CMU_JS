<style>
    /* Main banner with parallax effect */
    .main-banner {
        position: relative;
        height: 100vh;
        color: white;
        text-align: center;
        background-size: cover;
        background-position: center;
    }

    .background-filter {
        position: absolute;
        width: 100%;
        height: 100%;
        background: #0000008c;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .background-filter h1 {
        font-size: 4em;
        width: 900px;
        color: white;
        font-weight: 400;
        margin-bottom: 20px;
    }

    .browse-button {
        background-color: #FFD700;
        color: #000;
        padding: 15px 30px;
        font-size: 1.2em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .browse-button:hover {
        background-color: #FFA500;
    }

    /* Footer styles */
    footer {
        background-color: #2d2d2d;
        color: white;
        padding: 50px 0;
        text-align: center;
    }

    footer p {
        margin: 0;
        padding: 0;
    }

    footer .footer-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    footer .footer-content .description {
        margin-bottom: 30px;
        font-size: 1.3rem;
    }

    footer .footer-content .description strong {

        font-size: 1.5rem;
    }

    footer .footer-content nav a {
        margin: 0 15px;
        color: #ccc;
        text-decoration: none;
    }

    footer .footer-content nav a:hover {
        color: white;
    }

    footer .subscribe-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    footer .subscribe-container input {
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
    }

    footer .subscribe-container button {
        background-color: #FFD700;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    footer .subscribe-container button:hover {
        background-color: #FFA500;
    }
</style>




<div class="">
<?php
    // Fetch all volumes and determine which ones are published
    $volumes = $this->db->get_where('volume', array('published' => 1))->result_array();

    // Initialize an empty array to hold articles grouped by volume
    $articlesByVolume = array();

    foreach ($volumes as $volume) {
        $vol_id = $volume['vol_id'];
        $articlesByVolume[$vol_id] = array(); // Initialize an empty array for this volume

        // Now, fetch articles for this volume and only include those where the volume is published
        $articles = $this->db->query("
            SELECT articles.*, authors.author_name, volume.volume_name
            FROM articles
            INNER JOIN authors ON articles.auid = authors.auid
            INNER JOIN volume ON articles.vol_id = volume.vol_id
            WHERE articles.vol_id =? AND volume.published = 1
        ", array($vol_id))->result_array();

        foreach ($articles as $article) {
            $articlesByVolume[$vol_id][] = $article;
        }
    }
   ?>


    <style>
        .individual-card {
            position: relative;
        }

        .individual-card img {
            height: 150px;
            object-fit: cover;
            filter: brightness(.5);
        }

        .individual-card h5 {
            z-index: 1000;
            color: white;
            font-size: 1.5rem;
            position: absolute;
            top: 50px;
            left: 50px;
        }
    </style>

    <section class="main-banner" style="background: url('<?= base_url(); ?>assets/img/bg.png') no-repeat center/cover;">
        <div class="background-filter">
            <h1>Central Mindanao University</h1>
            <a>Journal Of Science</a>
        </div>
    </section>
    <h1 style="
    
               
    width:100%;
    text-align: center;
    height: 100px;
    margin-top:100px;
    font-size: 2rem;
    font-weight: bold;
    ">Articles</h1>

    <?php foreach ($articlesByVolume as $vol_id => $articles) : ?>
        <section class="my-5">

            <div class="row m-5">
                <!-- Left Column for Volume Name -->
                <div class="col-md-4" style="
                
    background: #17312a;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
">
                    <h2 class="font-weight-bold mb-4 color-white" style="color:white;"><?= !empty($articles) ? htmlspecialchars($articles[0]['volume_name']) : ''; ?></h2>
                </div>
                <!-- Right Column for Articles -->
                <div class="col-md-8">
                    <div class="row g-4">
                        <?php foreach ($articles as $article) : ?>
                            <div class="col-md-12">
                                <div class="individual-card card h-100 shadow-xl border-0">
                                    <h5 class="card-title font-weight-bold"><?= !empty($article) ? htmlspecialchars($article['title']) : ''; ?></h5>
                                    <img src="<?= !empty($article['image_url']) ? htmlspecialchars($article['image_url']) : base_url("assets/img/bg.png"); ?>" class="card-img-top" alt="Article Image">
                                    <div class="card-body">
                                        <p class="card-text small text-muted"><?= $article['abstract']; ?></p>
                                        <ul class="list-unstyled text-small mb-1">
                                            <li><strong>Author:</strong> <?= !empty($article) ? htmlspecialchars($article['author_name']) : ''; ?></li>
                                            <li><strong>Keywords:</strong> <?= !empty($article) ? htmlspecialchars($article['keywords']) : ''; ?></li>
                                            <li><strong>DOI:</strong> <?php echo $article['doi'];?></li>



                                        </ul>
                                        <a href="<?php echo base_url('admin/article/download/' . $article['filename']); ?>" class="btn-filled w-[175px] h-[49px]"><i class="ph ph-download mr-2"></i> Download PDF</a>

                                        <!-- <a href="#" class="btn btn-primary">Read More</a> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>


    <!-- Footer Starts Here -->
    <footer>
        <div class="footer-content">
            <p class="description">
                <strong>Journal of Science of Central Mindanao University</strong><br><br>

            </p>

        </div>
    </footer>

    <!-- Parallax Effect Script -->
    <script>
        // Parallax effect for the main banner
        window.addEventListener('scroll', function() {
            const scrollPosition = window.pageYOffset;
            const mainBanner = document.querySelector('.main-banner');
            mainBanner.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
        });
    </script>
</div>