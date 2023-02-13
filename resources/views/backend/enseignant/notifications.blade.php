@extends('backend/enseignant/layout/default', ['title' => "CEL || Notifications"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Notification</span></li>
                    </ul>
                    <h3 class="title">Notifications</h3>
                </div>
                <div class="box-notification">
                    <div class="alert">
                        <p class="paragraph">Vous avez <span>50</span> notifications non lus</p>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="box-tags">
                                    <div class="checkbox-group">
                                        <label class="checkbox">
                                            <input type="checkbox" value="">
                                            <p class="paragraph">Tout marquer comme lu</p>
                                            <span></span>
                                        </label>
                                        <button class="btn-standard-2">Valider</button>
                                    </div>
                                    <div class="tags">
                                        <h3>Tags</h3>
                                        <div class="tags-element">
                                            <div class="tags-element-categorie --info">Informations</div>
                                            <div class="tags-element-categorie --examen">Examen</div>
                                            <div class="tags-element-categorie --sujet">Sujet de compo</div>
                                            <div class="tags-element-categorie --rappel">Rappel</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="banner-notif">
                                    <div class="tags-element-categorie --info">Informations</div>
                                    <div class="message">
                                        <p class="paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque laboriosam nisi voluptates iure, 
                                            inventore alias non! Dicta, reiciendis sunt. Explicabo quisquam, veritatis labore mollitia est fuga? In, dolorem alias. Debitis?
                                        </p>
                                    </div>
                                    <div class="box-bottom">
                                        <p class="paragraph date">18 Juin 2021</p>
                                        <a href="#" class="lu-msg">Marquer comme lu</a>
                                    </div>
                                </div>
                                <div class="banner-notif">
                                    <div class="tags-element-categorie --sujet">Sujet de Composition</div>
                                    <div class="message">
                                        <p class="paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque laboriosam nisi voluptates iure, 
                                            inventore alias non! Dicta, reiciendis sunt. Explicabo quisquam, veritatis labore mollitia est fuga? In, dolorem alias. Debitis?
                                        </p>
                                    </div>
                                    <div class="box-bottom">
                                        <p class="paragraph date">18 Juin 2021</p>
                                        <div class="check-icon">
                                            <img src="{{asset('assets/images/check.svg')}}" alt="check">
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-notif">
                                    <div class="tags-element-categorie --examen">Examen</div>
                                    <div class="message">
                                        <p class="paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque laboriosam nisi voluptates iure, 
                                            inventore alias non! Dicta, reiciendis sunt. Explicabo quisquam, veritatis labore mollitia est fuga? In, dolorem alias. Debitis?
                                        </p>
                                    </div>
                                    <div class="box-bottom">
                                        <p class="paragraph date">18 Juin 2021</p>
                                        <div class="check-icon">
                                            <img src="{{asset('assets/images/check.svg')}}" alt="check">
                                        </div>
                                    </div>
                                </div>
                                <div class="banner-notif">
                                    <div class="tags-element-categorie --rappel">Rappel</div>
                                    <div class="message">
                                        <p class="paragraph">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque laboriosam nisi voluptates iure, 
                                            inventore alias non! Dicta, reiciendis sunt. Explicabo quisquam, veritatis labore mollitia est fuga? In, dolorem alias. Debitis?
                                        </p>
                                    </div>
                                    <div class="box-bottom">
                                        <p class="paragraph date">18 Juin 2021</p>
                                        <div class="check-icon">
                                            <img src="{{asset('assets/images/check.svg')}}" alt="check">
                                        </div>
                                    </div>
                                </div>

                                <!-- pagination -->
                                <div class="my-pagination">
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                    <div class="number">
                                        <span><a href="#" class="active">1</a></span>
                                        <span><a href="#">2</a></span>
                                        <span>...</span>
                                        <span><a href="#">6</a></span>
                                    </div>
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
@endsection