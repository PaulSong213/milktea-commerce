<html>

<head>
    <style>
        .card {
            margin: auto;
            width: 320px;
            max-width: 600px;
            border-radius: 20px
        }

        @media(max-width:767px) {
            .card {
                width: 80%
            }
        }

        @media(height:1366px) {
            .card {
                width: 75%
            }
        }

        #orderno {
            padding: 1vh 2vh 0;
            font-size: smaller
        }

        .gap .col-2 {
            background-color: #402d26;
            width: 1.2rem;
            padding: 1.2rem;
            margin-top: -2.5rem;
            border-radius: 1.2rem
        }

        .title {
            display: flex;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            padding: 12%
        }

        .main {
            padding: 0 2rem
        }

        .main img {
            border-radius: 7px
        }

        .main p {
            margin-bottom: 0;
        }

        #sub-title p {
            margin: 1vh 0 2vh 0;
        }

        .row-main {
            padding: 1.5vh 0;
            align-items: center
        }

        hr {
            margin: 1rem -1vh;
            border-top: 1px solid rgb(214, 214, 214)
        }
    </style>
</head>
<main>
    <!-- Modal -->
    <div class="modal fade" id="notificationModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-1" id="notificationModalLabel">Track Your Order</h1>
                    <button type="button" class="btn btn-close text-dark d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                        <span>X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mt-50 mb-50">
                        <div class="col d-flex"><span class="text-muted" id="orderno">order #546924</span></div>
                        <div class="gap">
                            <div class="col-2 d-flex mx-auto"> </div>
                        </div>
                        <h2 class="mx-auto my-3 mx-3"> Preparing your Order </h2>
                        <div class="w-100 d-flex justify-content-center">
                            <img class="w-75 mx-auto" src="/milktea-commerce/img/cooking.png">
                        </div>
                        <div class="main"> <span id="sub-title">
                                <p><b>Payment Summary</b></p>
                            </span>
                            <div class="row row-main">
                                <div class="col-3"> <img class="img-fluid" src="https://i.imgur.com/qSnCFIS.png"> </div>
                                <div class="col-6">
                                    <div class="row d-flex">
                                        <p class="fs-5 fw-bold">MILKTEA</p>
                                    </div>
                                    <div class="row d-flex">
                                        <p class="fs-6 fw-bold">12 ONZ</p>
                                    </div>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <p class="fs-6 fw-bold">12 ONZ</p>
                                </div>
                            </div>
                            <hr>
                            <div class="total pb-3">
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-4 fw-bold">TOTAL:</p>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <p class="fs-4 fw-bold">9999</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>

</html>