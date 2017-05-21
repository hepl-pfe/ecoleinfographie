@extends('layout')
@section('header')
	@include('partials.header-min')
@endsection

@section('class', 'internship')

@section('content')

	<div class="breadcrumb">
		<ol class="breadcrumb__list" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li class="breadcrumb__item" itemprop="itemListElement" itemscope
					itemtype="http://schema.org/ListItem">
				<a href="#" class="breadcrumb__link breadcrumb__link--home" itemscope itemtype="http://schema.org/Thing"
					 itemprop="item">
					<span itemprop="name">Page d’accueil</span>
				</a>
				<meta itemprop="position" content="1" />
			</li>
			<li class="breadcrumb__item" itemprop="itemListElement" itemscope
					itemtype="http://schema.org/ListItem">
				<a href="{{ Route('internship') }}" class="breadcrumb__link breadcrumb__link--active" itemscope itemtype="http://schema.org/Thing"
					 itemprop="item">
					<span itemprop="name">@lang('internship.title')</span>
				</a>
				<meta itemprop="position" content="2" />
			</li>
		</ol>
	</div>

	<section class="propose">
		<h2 role="heading" aria-level="2" class="propose__title">Proposer une offre de stage</h2>
		<p class="propose__paragraph">Maecenas tincidunt iaculis consectetur. Quisque quis suscipit orci, et tincidunt nunc. Mauris arcu lorem, aliquam vitae aliquet ac, egestas ut nisl. Sed bibendum ac justo non consectetur. Duis eleifend dolor enim, sed rutrum est dictum ut. Nulla neque risus, mattis pretium vulputate eu, ultrices ac elit. Vivamus in nunc nec ipsum luctus vestibulum. Pellentesque maximus lorem lobortis, vestibulum ante ac, efficitur augue. Quisque varius leo vitae aliquam volutpat.
		</p>
		<div class="propose__infos">
			<span class="propose__info propose__info--duration">Durée de <strong>12</strong> semaines</span>
			<span class="propose__info propose__info--date">Du <strong>13</strong> janvier au <strong>30</strong> mars</span>
			<span class="propose__info propose__info--convention"><strong>Signature</strong><br/> d’une convention</span>
		</div>
	</section>

	<section class="form">
		<div class="form__container">
			<h2 role="heading" aria-level="2" class="form__title">Déposer une offre</h2>
			<p class="form__paragraph">Vous reçevrez un email de confirmation de la part du professeur responsable une fois que votre offre aura été validée. Elle sera ensuite transmise aux élèves.</p>
			<div class="form__button-container">
				<button class="form__button form__button--detail form__button--active">
					<span class="form__button__label">Je remplis un formulaire détaillé</span>
				</button>
				<button class="form__button form__button--pdf">
					<span class="form__button__label">J’envoie une offre au format PDF</span>
				</button>
			</div>
		</div>

		{{ Form::open([ 'method' => 'POST', 'class' => 'form-full']) }}
		<div class="form__container">
			<div class="form__block">
				<div class="form__wrapper form__wrapper--col2 form__wrapper--left">
					<label for="name" class="form__label">Votre nom</label>
					<input type="text" name="name" id="name" class="form__input floatLabel" value="">
				</div>
				<div class="form__wrapper form__wrapper--col2 form__wrapper--right">
					<label for="company" class="form__label">Nom de l’entreprise concernée</label>
					<input type="text" name="company" id="company" class="form__input floatLabel" value="">
				</div>
			</div>
			<div class="form__block">
				<div class="form__wrapper">
					<label for="subject" class="form__label">Quel est le sujet de votre demande ?</label>
					<input type="text" name="subject" id="subject" class="form__input floatLabel" value="">
				</div>
			</div>
			<div class="form__block">
				<div class="form__wrapper">
					<span for="recipient" class="form__fakeLabel">À quelle option s’adresse votre offre&nbsp;?</span>
					<div class="form__checkbox-btn">
						<label for="cbox1" class="form__labelCheckbox">
							<span class="form__labelCheckbox__span">3D et Audiovisuel</span>
							<input type="checkbox" id="cbox1" value="" class="form__checkbox">
							<div class="form__control-indicator"></div>
						</label>
					</div>
					<div class="form__checkbox-btn">
						<label for="cbox2" class="form__labelCheckbox">
							<span class="form__labelCheckbox__span">Design graphique</span>
							<input type="checkbox" id="cbox2" value="" class="form__checkbox">
							<div class="form__control-indicator"></div>
						</label>
					</div>
					<div class="form__checkbox-btn">
						<label for="cbox3" class="form__labelCheckbox">
							<span class="form__labelCheckbox__span">Web</span>
							<input type="checkbox" id="cbox3" value="" class="form__checkbox">
							<div class="form__control-indicator"></div>
						</label>
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}

	</section>






@endsection