<?php
/**
 * Front page template.
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

$krizia_asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/';
?>
			</div><!-- .row -->
		</div><!-- .container -->

		<main id="primary" class="site-main krizia-front" role="main">
			<section class="kf-hero d-flex align-items-center text-white" style="background-image: linear-gradient(90deg, rgba(53, 40, 31, 0.72) 0%, rgba(53, 40, 31, 0.46) 42%, rgba(53, 40, 31, 0.12) 100%), url('<?php echo esc_url( $krizia_asset_uri . 'hero-reformer.jpg' ); ?>');">
				<div class="container kf-container">
					<div class="row">
						<div class="col-11 col-sm-8 col-lg-5 offset-lg-2">
							<p class="kf-eyebrow mb-2">Pilates studio</p>
							<h1 class="kf-hero-title mb-3">L&#039;Adresse</h1>
							<p class="kf-hero-subtitle mb-4">Un studio confidentiel pour pratiquer, respirer et retrouver un mouvement precis.</p>
							<a class="btn kf-button kf-button--light" href="#reservation">Reserver un cours</a>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--studio py-5" id="studio">
				<div class="container kf-container text-center">
					<p class="kf-section-kicker mb-3">Le studio</p>
					<div class="row no-gutters justify-content-center align-items-stretch mb-4">
						<div class="col-5 col-md-4 col-lg-3 px-1">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'studio-main.jpg' ); ?>" alt="Salle de pilates avec reformers" class="img-fluid kf-ratio kf-ratio--studio">
						</div>
						<div class="col-5 col-md-4 col-lg-3 px-1">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-detail.jpg' ); ?>" alt="Detail d'un reformer en bois" class="img-fluid kf-ratio kf-ratio--studio-tall">
						</div>
					</div>
					<p class="kf-text kf-text--narrow mx-auto mb-0">Au coeur d'un espace lumineux et apaisant, L'Adresse accueille des cours en petit comite pour un accompagnement attentif. Chaque seance associe exigence technique, ecoute du corps et progression durable.</p>
				</div>
			</section>

			<section class="kf-section kf-section--intro py-5">
				<div class="container kf-container">
					<div class="row align-items-center justify-content-center">
						<div class="col-6 col-sm-4 col-lg-3 order-2 order-lg-1 mt-4 mt-lg-0">
							<div class="kf-oval kf-oval--left mx-auto mx-lg-0">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'movement-detail.jpg' ); ?>" alt="Mouvement de pilates au sol">
							</div>
						</div>
						<div class="col-12 col-lg-5 order-1 order-lg-2 text-center">
							<p class="kf-section-kicker mb-2">Notre approche</p>
							<h2>Cultiver une force juste, stable et elegante</h2>
							<p class="kf-text mt-3 mb-0">Les cours s'adaptent a votre niveau et a votre rythme. Le travail se construit autour de la respiration, du centrage, de la mobilite et du controle afin d'ancrer une pratique precise, fluide et durable.</p>
							<p class="kf-text mt-3 mb-0">En reformer, au tapis ou en accompagnement prive, chaque format aide a retrouver de l'espace dans le mouvement et une meilleure conscience corporelle.</p>
						</div>
						<div class="col-6 col-sm-4 col-lg-3 order-3 mt-4 mt-lg-0">
							<div class="kf-oval kf-oval--right mx-auto">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'reformer-portrait.jpg' ); ?>" alt="Eleve allongee sur reformer">
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--courses pb-5" id="cours">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<p class="kf-section-kicker mb-2">Les cours</p>
							<h2 class="mb-4">Choisissez votre pratique</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-md-4 col-lg-3 mb-3 mb-md-0">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Classique Pilates</h3>
									<p class="card-text kf-text mt-3">Travail au sol, precision des appuis et renforcement profond.</p>
									<span class="kf-price mt-auto mb-3">25&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3 mb-3 mb-md-0">
							<article class="card kf-course-card kf-course-card--featured h-100 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Reformer</h3>
									<p class="card-text kf-text mt-3">Un accompagnement technique sur machines en petit groupe.</p>
									<span class="kf-price mt-auto mb-3">35&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3">
							<article class="card kf-course-card h-100 border-0 text-center">
								<div class="card-body d-flex flex-column align-items-center p-4">
									<h3 class="card-title text-uppercase">Programme prive</h3>
									<p class="card-text kf-text mt-3">Une seance construite autour de vos objectifs et besoins.</p>
									<span class="kf-price mt-auto mb-3">70&euro;</span>
									<a class="btn kf-button kf-button--brown" href="#reservation">Reserver</a>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-statement d-flex align-items-center text-center text-white" style="background-image: linear-gradient(90deg, rgba(44, 31, 24, 0.34), rgba(44, 31, 24, 0.58)), url('<?php echo esc_url( $krizia_asset_uri . 'pilates-extension.jpg' ); ?>');">
				<div class="container kf-container">
					<p class="kf-section-kicker mb-2">L'Adresse</p>
					<h2 class="mx-auto mb-0">Un lieu dedie a une pratique pilates</h2>
				</div>
			</section>

			<section class="kf-section kf-section--practice">
				<div class="container-fluid px-0">
					<div class="row no-gutters justify-content-center align-items-stretch">
						<div class="col-12 col-lg-5 d-flex align-items-center">
							<div class="kf-practice-copy mx-auto">
								<p class="kf-section-kicker mb-2">Pourquoi nous choisir</p>
								<h2>Pour aller plus loin dans votre mouvement</h2>
								<p class="kf-text mt-3 mb-0">Nous privilegions les groupes reduits pour corriger les placements, adapter les ressorts, installer les bons reperes et accompagner une progression sensible d'une seance a l'autre.</p>
								<p class="kf-text mt-3 mb-0">Le studio est pense comme un espace calme, chaleureux et exigeant, ouvert aux debutants comme aux pratiquants confirmes.</p>
								<a class="kf-link mt-3" href="#reservation">Decouvrir les formats</a>
							</div>
						</div>
						<div class="col-12 col-lg-5">
							<img src="<?php echo esc_url( $krizia_asset_uri . 'collective-class.jpg' ); ?>" alt="Cours collectif de pilates reformer" class="img-fluid kf-practice-image">
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--agenda pb-5" id="agenda">
				<div class="container kf-container">
					<div class="card kf-agenda-card border-0 mx-auto">
						<div class="card-body text-center">
							<div class="kf-monogram mx-auto" aria-hidden="true">LA</div>
							<p class="kf-section-kicker mb-4">Nos rendez-vous</p>
							<div class="kf-event-list text-left">
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>13</strong><span>Sept</span></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Atelier posture et respiration</h3>
										<p class="kf-text mb-0">Une session pour comprendre le centrage et installer une respiration efficace dans l'effort.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">25&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4 border-bottom">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>30</strong><span>Oct</span></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Masterclass reformer</h3>
										<p class="kf-text mb-0">Un cours technique pour affiner les transitions et approfondir le travail de resistance.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">25&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
								<article class="row align-items-center py-4">
									<div class="col-3 col-md-2 text-center">
										<div class="kf-event-date"><strong>05</strong><span>Juil</span></div>
									</div>
									<div class="col-9 col-md-6">
										<h3>Matinee decouverte</h3>
										<p class="kf-text mb-0">Une introduction douce au pilates et aux fondamentaux du travail sur appareil.</p>
									</div>
									<div class="col-3 col-md-1 offset-3 offset-md-0 mt-3 mt-md-0 kf-event-price">25&euro;</div>
									<div class="col-6 col-md-3 mt-3 mt-md-0 text-md-right">
										<a class="btn kf-button kf-button--brown" href="#reservation">S'inscrire</a>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-quote-band d-flex align-items-center text-center text-white" style="background-image: linear-gradient(rgba(50, 35, 27, 0.44), rgba(50, 35, 27, 0.44)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-wide.jpg' ); ?>');">
				<div class="container kf-container">
					<p class="mx-auto mb-0">Un espace intime, equipe et lumineux pour apprendre a bouger avec plus de conscience, de force et de liberte.</p>
				</div>
			</section>

			<section class="kf-section kf-section--team py-5" id="equipe">
				<div class="container kf-container text-center">
					<p class="kf-section-kicker mb-2">Formateurs</p>
					<h2 class="mb-4">Une equipe attentive</h2>
					<div class="row justify-content-center">
						<div class="col-8 col-sm-4 col-lg-2 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-amelie.jpg' ); ?>" alt="Portrait d'Amelie, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-8 col-sm-4 col-lg-2 mb-4 mb-sm-0">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-elise.jpg' ); ?>" alt="Portrait d'Elise, formatrice pilates" class="img-fluid">
							</article>
						</div>
						<div class="col-8 col-sm-4 col-lg-2">
							<article class="kf-team-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'coach-marc.jpg' ); ?>" alt="Portrait de Marc, formateur pilates" class="img-fluid">
							</article>
						</div>
					</div>
					<p class="kf-text kf-text--narrow mx-auto mt-4 mb-0">Nos enseignants partagent une meme exigence : transmettre une pratique claire, precise et accessible, dans un cadre ou chaque corps trouve sa progression.</p>
				</div>
			</section>

			<section class="kf-section kf-section--faq py-5" id="questions">
				<div class="container kf-container">
					<div class="row justify-content-center text-center">
						<div class="col-12 col-lg-7">
							<p class="kf-section-kicker mb-2">Vos questions</p>
							<h2 class="mb-4">Avant votre premiere seance</h2>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-8">
							<div class="accordion kf-faq-accordion" id="kfFaq">
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingOne">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqOne" aria-expanded="false" aria-controls="kfFaqOne">Faut-il avoir deja pratique le pilates ?</button>
									</div>
									<div id="kfFaqOne" class="collapse" aria-labelledby="kfFaqHeadingOne" data-parent="#kfFaq">
										<div class="card-body">Non. Les cours debutants et les seances privees permettent d'apprendre les bases avec un encadrement progressif.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingTwo">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqTwo" aria-expanded="false" aria-controls="kfFaqTwo">Combien de personnes participent a un cours ?</button>
									</div>
									<div id="kfFaqTwo" class="collapse" aria-labelledby="kfFaqHeadingTwo" data-parent="#kfFaq">
										<div class="card-body">Les groupes restent volontairement reduits afin de garantir des corrections individuelles et une vraie qualite d'accompagnement.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingThree">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqThree" aria-expanded="false" aria-controls="kfFaqThree">Quel cours choisir pour commencer ?</button>
									</div>
									<div id="kfFaqThree" class="collapse" aria-labelledby="kfFaqHeadingThree" data-parent="#kfFaq">
										<div class="card-body">Le cours classique est ideal pour installer les fondamentaux. Le reformer convient aussi aux debutants avec un accompagnement adapte.</div>
									</div>
								</div>
								<div class="card border-left-0 border-right-0 rounded-0">
									<div class="card-header bg-transparent p-0" id="kfFaqHeadingFour">
										<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#kfFaqFour" aria-expanded="false" aria-controls="kfFaqFour">Comment reserver ou annuler ?</button>
									</div>
									<div id="kfFaqFour" class="collapse" aria-labelledby="kfFaqHeadingFour" data-parent="#kfFaq">
										<div class="card-body">La demande de reservation se fait via le formulaire. Nous vous confirmons ensuite le creneau et les conditions pratiques.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-section kf-section--values py-5">
				<div class="container kf-container text-center">
					<p class="kf-section-kicker mb-2">Ce qui definit L'Adresse</p>
					<h2 class="mb-4">Une pratique precise, calme et vivante</h2>
					<div class="row justify-content-center">
						<div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'hands-detail.jpg' ); ?>" alt="Detail de mains en mouvement" class="img-fluid">
								<h3 class="mt-3">Attention</h3>
								<p class="kf-text mb-0">Des corrections fines et une presence constante pendant la seance.</p>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'chair-class.jpg' ); ?>" alt="Pratique pilates sur appareil" class="img-fluid">
								<h3 class="mt-3">Precision</h3>
								<p class="kf-text mb-0">Un travail technique pour renforcer sans brusquer ni compenser.</p>
							</article>
						</div>
						<div class="col-12 col-md-4 col-lg-3">
							<article class="kf-value-card">
								<img src="<?php echo esc_url( $krizia_asset_uri . 'outdoor-portrait.jpg' ); ?>" alt="Portrait souriant apres une seance" class="img-fluid">
								<h3 class="mt-3">Respiration</h3>
								<p class="kf-text mb-0">Un rythme qui aide a retrouver espace, ancrage et confiance.</p>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-final-cta d-flex align-items-center text-white" style="background-image: linear-gradient(90deg, rgba(38, 27, 20, 0.42), rgba(38, 27, 20, 0.12)), url('<?php echo esc_url( $krizia_asset_uri . 'studio-reception.jpg' ); ?>');">
				<div class="container kf-container">
					<div class="row align-items-center">
						<div class="col-12 col-lg-8">
							<p class="kf-section-kicker mb-2">Rejoindre le studio</p>
							<h2 class="mb-4 mb-lg-0">Commencer avec une seance adaptee</h2>
						</div>
						<div class="col-12 col-lg-4 text-lg-right">
							<a class="btn kf-button kf-button--light" href="#reservation">Reserver maintenant</a>
						</div>
					</div>
				</div>
			</section>

			<section class="kf-contact py-5" id="reservation">
				<div class="container kf-container">
					<div class="row justify-content-center">
						<div class="col-12 col-lg-4 mb-5 mb-lg-0">
							<div class="kf-contact-info">
								<div class="kf-monogram kf-monogram--light" aria-hidden="true">LA</div>
								<p class="kf-section-kicker mb-2">Nous contacter</p>
								<h2>L'Adresse Pilates</h2>
								<p>14 rue du Studio<br>75000 Paris</p>
								<p><a href="mailto:bonjour@ladresse-pilates.fr">bonjour@ladresse-pilates.fr</a><br><a href="tel:+33100000000">+33 1 00 00 00 00</a></p>
								<a class="btn kf-button kf-button--outline" href="#studio">Voir le studio</a>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<form class="kf-form" action="#" method="post">
								<div class="form-group">
									<label class="screen-reader-text" for="kf-name">Nom</label>
									<input id="kf-name" class="form-control" type="text" name="name" placeholder="Nom">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-email">Email</label>
									<input id="kf-email" class="form-control" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-phone">Telephone</label>
									<input id="kf-phone" class="form-control" type="tel" name="phone" placeholder="Telephone">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-course">Cours souhaite</label>
									<input id="kf-course" class="form-control" type="text" name="course" placeholder="Cours souhaite">
								</div>
								<div class="form-group">
									<label class="screen-reader-text" for="kf-message">Message</label>
									<textarea id="kf-message" class="form-control" name="message" rows="5" placeholder="Message"></textarea>
								</div>
								<button class="btn kf-button kf-button--outline" type="submit">Envoyer la demande</button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</main>

		<div class="container">
			<div class="row">
<?php
get_footer();
