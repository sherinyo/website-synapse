@extends('base.base')

@section('title', 'Tentang Kami')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Student Union ISB</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .banner {
            height: 400px;
            background-color: #d9d9d9;
        }
        .visi-heading,
        .misi-heading,
        .dept-heading,
        .faq-heading {
            font-weight: 800;
            color: #344ead;
            font-size: 60px;
        }
        .line-divider {
            height: 4px;
            width: 600px;
            background-color: #081F5C;
            margin: 5rem auto;
        }
        .misi-card, .dep-card, .faq-card {
            box-shadow: 5px 5px 10px rgba(0,0,0,0.2);
            background-color: #f7f2eb;
            padding: 20px;
            border-radius: 8px;
        }
        .dep-card {
            width: 100%;
            height: 310px;
            background-color: rgba(247, 242, 235, 1);
            border-radius: 8px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 0;
            margin:0;
        }

        .dep-image {
            height: 45%;
            margin: 0;
            background-color: #d9d9d9;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; /* Penting untuk menyesuaikan gambar */
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .dep-card h5 {
            font-size: 18px;
            font-weight: 700;
            color: #081F5C;
            margin-bottom: 5px;
        }

        .dep-card p {
            font-size: 12px;
            color: #565353;
            margin-bottom: auto;
        }

        .dep-btn {
            background-color: #081F5C;
            color: #F7F2EB;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            padding: 10px;
            margin-top: auto;
            transition: background-color 0.3s ease;
        }

        .dep-btn:hover {
            background-color: #FFF9F0;
            border: 1px solid #334EAC;
        }

        .faq-card {
            background-color: #FFF9F0;
            border: 2px solid #334EAC;
        }
        .accordion-button {
            background-color: #FFF9F0;
            border: 2px solid #CFCDBD !important;
            border-radius: 4px !important;
            color: #081F5C;
            font-size: 20px;
            font-weight: normal;
            padding: 0 21px;
            height: 71px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background-color 0.2s ease;
        }

        .accordion-button:hover {
            background-color: #f0eadc;
        }

        .accordion-button:not(.collapsed) {
            background-color: #FFF9F0;
            color: #081F5C;
            box-shadow: none;
        }

        .accordion-button::after {
            margin-left: auto;
        }

        .accordion-item {
            border: none;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <section class="banner" style="background-image: url('/images/example.jpg');"></section>

    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="visi-heading">VISI</h1>
                <p class="text-primary-emphasis">Membentuk Student Union ISB yang berkualitas dan berdampak secara individual maupun secara keseluruhan, menjadi ujung tombak perubahan bagi lingkungan sekitar serta membawa nama UC ISB semakin dikenal luas secara positif</p>
            </div>
            <div class="col-md-5 text-center">
                <div class="border rounded-circle d-flex align-items-center justify-content-center" style="width: 250px; height: 250px; margin: auto;">
                    <span>Image</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <h1 class="misi-heading mb-4">MISI</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="misi-card h-100">
                    <p>Membangun Student Union yang berkualitas dimulai dari meningkatkan kompetensi anggota melalui pelatihan kepemimpinan serta dari program-program kerja yang ada.</p>
                </div>
            </div>
            <div class="col">
                <div class="misi-card h-100">
                    <p>Membangun kekeluargaan dalam Student Union itu sendiri agar kinerja Student Union dapat lebih optimal juga.</p>
                </div>
            </div>
            <div class="col">
                <div class="misi-card h-100">
                    <p>Menjadi Role Model bagi lingkungan sekitar dimana Student Union bisa lebih berdampak lagi pada lingkungan sekitar.</p>
                </div>
            </div>
            <div class="col">
                <div class="misi-card h-100">
                    <p>Mendorong dan mendukung inovasi serta prestasi dari mahasiswa ISB Universitas Ciputra Surabaya.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="line-divider"></div>

    <section class="container py-5">
        <h1 class="dept-heading text-center mb-5">DEPARTMENT</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/logoHeader.png');"></div>
                <h5 class="fw-bold">Head of Department</h5>
                <p>Memimpin dan mengkoordinasikan seluruh divisi dalam SU ISB</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Publication, Documentation, & Design</h5>
                <p>Mengelola kegiatan kreatif dan promosi internal serta eksternal</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Digital Innovation</h5>
                <p>Bertanggung jawab dalam hal keuangan dan pengelolaan dana</p>
                <a href="{{ url('/detail-di') }}">
                    <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
                </a>            
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Inventory</h5>
                <p>Mengembangkan teknologi informasi dan sistem internal SU ISB</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Public Relation</h5>
                <p>Menjaga hubungan eksternal dan kerjasama antar organisasi</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Finance & Fundraising</h5>
                <p>Mengelola pengembangan sumber daya mahasiswa dan pelatihan</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">External Development</h5>
                <p>Menyelenggarakan kegiatan sosial dan kemasyarakatan</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
        </div>
        <div class="col">
            <div class="dep-card p-3">
            <div class="dep-image mb-3" style="background-image: url('/images/nama-gambar.jpg');"></div>
                <h5 class="fw-bold">Internal Development</h5>
                <p>Mengatur administrasi, dokumentasi, dan kesekretariatan</p>
                <button class="btn dep-btn mt-auto w-100">Selengkapnya</button>
            </div>
    </div>
</div>

    </section>

    <div class="line-divider"></div>

    <div class="container my-5">
  <div class="row align-items-center">

    <!-- FAQ Section -->
    <div class="col-lg-6 mb-4 mb-lg-0">
      <h1 class="mb-4 fw-bold" style="color:#334EAC">Frequently Asked Questions</h1>
      <p>Ada pertanyaan seputar Student Union ISB? Berikut jawaban dari pertanyaan yang sering diajukan sejauh ini</p>

      <div class="accordion" id="faqAccordion">
        <!-- Accordion Item 1 -->
        <div class="accordion-item">
        <h3 class="accordion-header" id="faqOneHeading">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne"
            aria-expanded="true" aria-controls="faqOne">
            Aku mau join SU ISB, gimana caranya & kapan?
            </button>
        </h2>
        <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqOneHeading"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Jawaban
            </div>
        </div>
        </div>

        <!-- Accordion Item 2 -->
        <div class="accordion-item">
        <h2 class="accordion-header" id="faqTwoHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo"
            aria-expanded="false" aria-controls="faqTwo">
            Apa saja benefit bergabung dengan SU ISB?
            </button>
        </h2>
        <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqTwoHeading"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Jawaban
            </div>
        </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="accordion-item">
        <h2 class="accordion-header" id="faqThreeHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree"
            aria-expanded="false" aria-controls="faqThree">
            Apakah saja program kerja SU ISB?
            </button>
        </h2>
        <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqThreeHeading"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Jawaban
            </div>
        </div>
        </div>

        <!-- Accordion Item 4 -->
        <div class="accordion-item">
        <h2 class="accordion-header" id="faqFourHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour"
            aria-expanded="false" aria-controls="faqFour">
            Bagaimana cara mendapatkan KP penelitian?
            </button>
        </h2>
        <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="faqFourHeading"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Jawaban
            </div>
        </div>
        </div>

        <!-- Accordion Item 5 -->
        <div class="accordion-item">
        <h2 class="accordion-header" id="faqFiveHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive"
            aria-expanded="false" aria-controls="faqFive">
            Apa saja proker unggulan SU ISB?
            </button>
        </h2>
        <div id="faqFive" class="accordion-collapse collapse" aria-labelledby="faqFiveHeading"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
            Jawaban
            </div>
        </div>
        </div>
      </div>
    </div>

    <!-- Gambar Section -->
    <div class="col-lg-6 text-center">
      <img src="/images/faq-image.png" alt="Gambar FAQ" class="img-fluid" style="max-height: 400px;">
    </div>

  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
