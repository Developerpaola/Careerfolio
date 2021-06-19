<section class="section">
        <div class="container">
            <h2>How it works</h2>
            <div class="line"></div>
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-choose" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Choose your own</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-spin" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Spin the bottl</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-drink" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">What we’re drinking</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-choose" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row align-items-start">
                        <div class="col">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/home/choose-your-own-choose colours-bottl.svg" alt="Choose your colours" />
                            <h3>Choose your colours</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                        <div class="col">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/home/choose-your-own-define-profiles-bottl.svg" alt="Choose your colours" />
                            <h3>Define your profiles</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                        <div class="col">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/home/choose-your-own-6-bottles-bottl.svg" alt="Choose your colours" />
                            <h3>Pick 6 bottles</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                        <div class="col">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/home/choose-your-own-frequnecy-bottl.svg" alt="Choose your colours" />
                            <h3>Choose frequency</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-spin" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row align-items-start">
                        <div class="col">
                        One of three columns
                        </div>
                        <div class="col">
                        One of three columns
                        </div>
                        <div class="col">
                        One of three columns
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-drink" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="row align-items-start">
                        <div class="col">
                        One of three columns
                        </div>
                        <div class="col">
                        One of three columns
                        </div>
                        <div class="col">
                        One of three columns
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>