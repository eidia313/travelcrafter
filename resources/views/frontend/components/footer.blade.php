<footer class="footer">
  <div class="footer__top">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>Find Activities</h6>
          <ul class="footer__nav">
            @foreach($activities as $a)
              <li>
                <a href="{{url('activity')}}/{{$a->slug}}">{{$a->name}}</a>
              </li>
            @endforeach
            <li>
              <a href="#">Leisure</a>
            </li>
            <li>
              <a href="{{url('tailor-made-trip')}}">Leisure</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Travel Support</h6>
          <ul class="footer__nav">
            <li>
              <a href="{{route('site.about')}}">About High Country</a>
            </li>
            <li>
              <a href="#">Social Welfare</a>
            </li>
            <li>
              <a href="{{route('site.page',['know-before-you-come'])}}">Know Before You Come</a>
            </li>
            <li>
              <a href="{{route('site.faq')}}">FAQs</a>
            </li>
            <li>
              <a href="{{route('site.contact')}}">Contact</a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 newsletter">
          <h6>Be the first in the known</h6>
          <p>Sign up to our newsletter to know about special offers. Get up to date in our travel news, exciting podcasts where we discuss our tips and tricks to you! We hate span as much as you do, so we'll never send you more emails than you want, and you can unsubscribe at any time.</p>
          <div class="newsletter__wrap">
            @section('css')
            <!-- Begin Mailchimp Signup Form -->
            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
            <style type="text/css">
              #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
              /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                 We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>
            @endsection

          <div id="mc_embed_signup">
            <form action="https://gmail.us20.list-manage.com/subscribe/post?u=11943b4585471d914f9a5bffb&amp;id=2aed152042" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter__form" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
                <div class="mc-field-group">
              	  <input type="email" value="" name="EMAIL" class="required email form-control d-inline-block align-middle" placeholder="yourpersonal@email.com" id="mce-EMAIL">
                  <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary btn-sm d-inline-block align-middle">Sign Up!</button>
                  <!-- <input type="submit" > -->
                </div>
              	<div id="mce-responses" class="clear">
              		<div class="response" id="mce-error-response" style="display:none"></div>
              		<div class="response" id="mce-success-response" style="display:none"></div>
              	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_11943b4585471d914f9a5bffb_2aed152042" tabindex="-1" value=""></div>
              </div>
            </form>
          </div>
          <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
          <!--End mc_embed_signup-->
            <!-- <form class="newsletter__form" method="post">
              <div class="form-group d-flex align-items-center">
                <input type="email" name="newsletter" value="" class="form-control" placeholder="yourpersonal@email.com">
                <button type="button" name="button" class="btn btn-secondary btn-sm">Sign Up!</button>
              </div>
            </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__copy">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="footer__assoc d-flex align-items-center">
        <span>Associated With</span>
        <ul>
          <li>
            <img src="" alt="">
          </li>
          <li>
            <img src="" alt="">
          </li>
          <li>
            <img src="" alt="">
          </li>
        </ul>
      </div>
      <div class="footer__copyright d-flex align-items-center">
        <div class="footer__copyright--copy text-right">
          <p>Copyright &copy; 2019. High Country Trekking &amp; Expedition. All Rights Reserved.</p>
        </div>
        <div class="footer__copyright--logo">
          <img src="{{url('storage/images')}}/{{$settings->logo}}" alt="{{$settings->sitename}}" width="90">
        </div>
      </div>
    </div>

  </div>
</footer>
