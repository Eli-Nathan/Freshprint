<?php
  include "_includes/formHandler.php";
  $pageTitle = "Home | Fresh print";
  include "_includes/header.php";
?>
  <div class="hero text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="hero__heading">Welcome to Fresh Print Glasgow</h1>
          <p class="hero__copy">Get in touch and let us show you how fast, reliable and affordable we are!</p>
          <div class="mt-4 hero__btns">
            <a href="#" class="btn btn-fresh btn-lg mx-1">Find out more</a>
            <a href="#" class="btn btn-outline-light btn-lg mx-1">Get in touch</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="aim">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <h2 class="aim__heading">Our aim</h2>
          <hr>
          <p class="aim__copy">We aim to be the most reliable design, print and sign making company with the fastest turnaround in the UK, and we’re doing pretty well so far.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="testimonial text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <p class="testimonial__copy"><i class="fas fa-quote-left"></i> &nbsp; Brilliant guys, done a fantastic job of my banners.
            Quality product well presented at a reasonable price. Very pleased.
          </p>
          <p class="testimonial__name">
            Benjamin James
          </p>
          <p class="testimonial__stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <div class="row">
        <div class="products__intro col-md-12 col-lg-3">
          <h2 class="products__heading">At Your Service</h2>
          <hr class="ml-0">
          <p>
            Here are a few of the services we offer, however, we can print almost anything so please get in touch if you need something else.
          </p>
        </div>
        <div class="products__items col-md-12 col-lg-9">
          <div class="row">
            <div class="item-box item-box--printing col-sm-4">
              <h4 class="item-box__heading">Printed vinyls</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
            <div class="item-box item-box--card col-sm-4">
              <h4 class="item-box__heading">Cut out vinyls</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
            <div class="item-box item-box--building col-sm-4">
              <h4 class="item-box__heading">Banners</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
            <div class="item-box item-box--sign col-sm-4">
              <h4 class="item-box__heading">Signage</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
            <div class="item-box item-box--wrench col-sm-4">
              <h4 class="item-box__heading">Installation</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
            <div class="item-box item-box--pen col-sm-4">
              <h4 class="item-box__heading">Design</h4>
              <p class="item-box__copy">Lorem ipsum dolor sit amet so lorem.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <h2 class="aim__heading text-center">Contact us</h2>
          <hr>
          <p class="aim__copy text-center">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>

        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <form action="<?PHP $_SERVER['PHP_SELF'] ?>#contact" method="POST" enctype="multipart/form-data">
            <?php if(isset($_GET['mail']) && $_GET['mail'] == true) { ?>
              <div class="alert alert-success" role="alert">
                Message sent! We'll get back to you as soon as possible.
              </div>
            <?php } ?>
            <?php if(isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
              </div>
            <?php } ?>
            <label class="form-label" for="name">Name</label>
            <input class="form-input" type="text" placeholder="Your name here" name="name" id="name" <?php if(isset($_GET['name'])) { echo "value='" . $_GET['name'] ."'"; } ?> />
            <label class="form-label" for="name">Email</label>
            <input class="form-input" type="email" placeholder="Your email here" name="email" id="email" <?php if(isset($_GET['email'])) { echo "value='".$_GET['email'] ."'"; } ?> />
            <div class="box">
              <p class="synth-label">File upload (Max 2MB)</p>
              <!-- <p class="error-message"><?php //echo $errors; ?></p> -->
    					<input type="file" name="image" id="file" class="inputfile sr-only" data-multiple-caption="{count} files selected" multiple />
    					<label for="file">
                <strong>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;
                </strong>
                <span></span>
              </label>
    				</div>
            <label for="comments" class="form-label">Your message</label>
            <textarea name="comments" id="comments" class="form-input form-input--textarea"><?php if(isset($_GET['message'])) { echo $_GET['message']; } ?></textarea>
            <div class="alert alert-info mt-1 d-none" role="alert">
              We are sending your message now. Please don't refresh or close this page.
              <div class="sk-circle">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-fresh btn-lg mb-1">Send it!</button>
        </div>
      </div>
    </div>
  </div>
  <?php include "_includes/footer.php"; ?>
