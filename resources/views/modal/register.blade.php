<section>
                         
<div class="modal fade" id="exampleModalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="color: black;" class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="modal-body">


                    <div class="mb-3">
                        <input type="email" name="email" style="padding: 4%; background-color:#F2F2F2;" class="form-control"
                            id="recipient-name" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="name" name="name" style="padding: 4%; background-color:#F2F2F2;" class="form-control"
                            id="recipient-name" placeholder="Логин">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" style="padding: 4%; background-color:#F2F2F2;" class="form-control"
                            id="recipient-name" placeholder="Пароль">
                    </div>

               
            </div>
            <button
            style="background-color: black; width:40%; color:white; padding:2% 7% 2% 7%; font-size: 26px; margin: 0px 10px 10px 10px"
            type="submit">Войти</button>
        </form>


        </div>
    </div>
</div>

</section>
