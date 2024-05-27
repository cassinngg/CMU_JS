<div class="container py-5">
    <h1 style="
    
               
    width:100%;
    text-align: left;
    height: 100px;

    font-size: 2.5rem;
    font-weight: bold;
    ">Volumes</h1>
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

    <?php foreach ($articlesByVolume as $vol_id => $articles) : ?>
        <div class="card-group my-5">
            <?php if (!empty($articles)) : ?>
                <div class="col-md-4 bg-dark text-white d-flex align-items-center justify-content-center" style="border-radius: 10px; position: relative; overflow: hidden;">
                    <img src="<?= base_url(); ?>assets/img/bg.png" alt="" style="
                    
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: blur(3px) brightness(0.5);
    
    z-index: 0;
">
                    <h2 class="mb-4" style="color: white; position: relative; z-index: 100;"><?= $articles[0]['volume_name']; ?></h2>
                </div>
                <?php foreach ($articles as $article) : ?>
                    <div class="col-md-8">
                        <div class="card h-100 shadow-lg border-0">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><?= $article['title']; ?></h5>
                                <p class="card-text small text-muted"><?= $article['abstract']; ?></p>
                                <ul class="list-unstyled text-small mb-1">
                                    <li><strong>Author:</strong> <?= $article['author_name']; ?></li>
                                    <li><strong>Keywords:</strong> <?= $article['keywords']; ?></li>
                                    <li><strong>DOI:</strong> <?php echo $article['doi'];?></li>
                                    <li><strong>Volume:</strong> <?php echo $volume['volume_name'];?></li>
                                    <a href="<?php echo base_url('admin/article/download/' . $article['filename']); ?>" class="btn-filled w-[175px] h-[49px]"><i class="ph ph-download mr-2"></i> Download PDF</a>
                                </ul>
                                <!-- <a href="#" class="btn btn-warning">Read More</a> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>