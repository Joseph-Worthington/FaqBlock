<?php
/**
 * Title: faq
 * Slug:firstinternet/faq
 * Categories: faq
 * Viewport width: 1400
 */
?>


<?php
$faqs = new WP_Query( array(
  'post_type' => 'faqs',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
) );

if ( $faqs->have_posts() ) : ?>
  <div class="faq section">
    <div class="faq-container row align-items-center">
      <div class="col-12 col-md-10 col-lg-8 m-auto">
        <div class="faq-questions">
          <?php while ( $faqs->have_posts() ) : $faqs->the_post(); 
              $question = get_field('question');
              $answer = get_field('answer');

          ?>

            <div class="faq-question">
              <button class="faq-question-button" aria-expanded="false" aria-controls="faq-answer-<?php the_ID(); ?>">
                <?php echo $question ?>
                <span class="faq-icon">
                  <span class="vertical-line"></span>
                  <span class="horizontal-line"></span>
                </span>
              </button>
              <div class="faq-answer" id="faq-answer-<?php the_ID(); ?>">
                <?php echo $answer; ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
    </div>
  </div>
<?php endif; ?>