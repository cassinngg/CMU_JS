<div class="container py-5">
    <h1 style="
               width:100%;
               text-align: left;
               height: 100px;
               font-size: 2.5rem;
               font-weight: bold;">Archives</h1>
    <?php
    // Fetch all volumes and determine which ones are not published
    $volumes = $this->db->get_where('volume', array('published' => 0))->result_array();

    // Initialize an empty array to hold articles grouped by volume
    $articlesByVolume = array();

    foreach ($volumes as $volume) {
        $vol_id = $volume['vol_id'];
        $articlesByVolume[$vol_id] = array(); // Initialize an empty array for this volume

        // Fetch articles for this volume and only include those where the volume is not published
        $articles = $this->db->query("
            SELECT articles.*, authors.author_name, volume.volume_name, volume.published
            FROM articles
            INNER JOIN authors ON articles.auid = authors.auid
            INNER JOIN volume ON articles.vol_id = volume.vol_id
            WHERE articles.vol_id =? AND volume.published = 0
        ", array($vol_id))->result_array();

        foreach ($articles as $article) {
            $articlesByVolume[$vol_id][] = $article;
        }
    }
    ?>

    <div class="m-5">
        <ul>
            <?php foreach ($articlesByVolume as $vol_id => $articles) : ?>
                <li style="display: flex; gap: 10px; margin: 20px">
                    <?php if (!empty($articles)) : ?>
                        <div class="col-md-4 bg-dark text-white d-flex align-items-center justify-content-center" style="border-radius: 10px; position: relative; overflow: hidden; backround: green;">

                            <h2 class="mb-4" style="color: white; position: relative; z-index: 100;"><?= $articles[0]['volume_name']; ?></h2>
                        </div>
                        <div class="left-side">
                            <?php foreach ($articles as $article) : ?>
                                <div class="col-md-12">
                                    <div class="card h-100 shadow-lg border-0">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold"><?= $article['title']; ?></h5>
                                            <p class="card-text small text-muted"><?= $article['abstract']; ?></p>
                                            <ul class="list-unstyled text-small mb-1">
                                                <li><strong>Author:</strong> <?= $article['author_name']; ?></li>
                                                <li><strong>Keywords:</strong> <?= $article['keywords']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>