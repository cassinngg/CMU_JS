<div class="m-5">
    <?php
    // Fetch all volumes and determine which ones are published
    $volumes = $this->db->get_where('volume', array('published' => 0))->result_array();

    // Initialize an empty array to hold articles grouped by volume
    $articlesByVolume = array();

    foreach ($volumes as $volume) {
        $vol_id = $volume['vol_id'];
        $articlesByVolume[$vol_id] = array(); // Initialize an empty array for this volume

        // Now, fetch articles for this volume and only include those where the volume is published
        $articles = $this->db->get_where('articles', array('vol_id' => $vol_id, 'published' => 0))->result_array();

        foreach ($articles as $article) {
            $articlesByVolume[$vol_id][] = $article;
        }
    }
   ?>

    <div class="m-5">
        <ul>
            <?php foreach ($articlesByVolume as $vol_id => $articles) :?>
                <li>
                    <h3>Volume <?php echo $vol_id;?></h3>
                    <div class="column">
                        <?php foreach ($articles as $article) :?>
                            <div class="col-md-20">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $article['title'];?></h5>
                                        <p class="card-text"><?php echo $article['keywords'];?></p>
                                        <p class="card-text"><?php echo $article['abstract'];?></p>
                                        <?php if (!empty($article['authors'])) :?>
                                            <div class="flex items-center space-x-2">
                                                <div>
                                                    <p class="font-medium leading-4">
                                                        <?php echo $article['authors'][0]['author_name'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php else :?>
                                            <p class="font-medium leading-4">
                                                No Author Assigned
                                            </p>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
