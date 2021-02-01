@extends('welcome')
@section('content')

    @php if (isset($message)){ @endphp

    <div id="messageContact" class="row w-100 text-center text-white p-3 m-0" style="background-color: #455d6a;">
        <div class="col-6 text-left">@php  echo $message; @endphp</div>
        <div class="col-6 text-right"><button onclick="displayMessage()" style="outline: none;">X</button></div>
    </div>

    @php } @endphp

    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="{{asset('img/img-01.png')}}">
            </div>

            <form class="contact1-form validate-form" method="POST" action="{{ route('contact.send') }}">
                @csrf

				<h3 class="text-center">Contactez-nous</h3>
                <br>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="name" placeholder="Nom">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input1" type="text" name="email" placeholder="Email">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Subject is required">
                    <input class="input1" type="text" name="subject" placeholder="Sujet">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input" data-validate="Message is required">
                    <textarea class="input1" name="message" placeholder="Message"></textarea>
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn">
						<span>
							Envoyer
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function displayMessage() {
            document.getElementById('messageContact').style.display = 'none';
        }
    </script>

@endsection

