<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="alert alert-info">
            <div class="alert-body">
                <div class="alert-title fw-bold">Selamat Datang!</div>
                Selamat datang, Admin PPDGS Bedah Mulut dan Maksilofasial. Semoga hari Anda produktif.
            </div>
        </div>

        <div class="row mb-4">
            <!-- Info Card: Pengunjung Hari Ini -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-custom-dashboard bg-gradient-purple">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="text-white">
                                <h6 class="mb-1">Pengunjung Hari Ini</h6>
                                <h2 class="mb-0"><?= number_format($pengunjungHariIni) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Info Card: Pengunjung Bulan Ini -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-custom-dashboard bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="text-white">
                                <h6 class="mb-1">Pengunjung Bulan Ini</h6>
                                <h2 class="mb-0"><?= number_format($pengunjungBulanIni) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Info Card: Total Berita -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-custom-dashboard bg-gradient-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">

                            <div class="text-white">
                                <h6 class="mb-1">Total Berita</h6>
                                <h2 class="mb-0"><?= number_format($totalBerita) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Info Card: Total Aktivitas Residen -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-custom-dashboard bg-gradient-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">

                            <div class="text-white">
                                <h6 class="mb-1">Total Aktivitas Residen</h6>
                                <h2 class="mb-0"><?= number_format($totalStudentActivity) ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Bar Chart: Ringkasan Konten Utama -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Ringkasan Konten Utama</h6>
                        <div style="height: 300px;">
                            <canvas id="mainContentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Line Chart: Tren Aktivitas Terbaru -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Aktivitas Baru (30 Hari Terakhir)</h6>
                        <div style="height: 300px;">
                            <canvas id="recentActivityTrendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Activity: Berita Terbaru -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title mb-2">Berita Terbaru</h6>
                        <?php if (!empty($recentBerita)) : ?>
                            <ul class="list-unstyled list-unstyled-border">
                                <?php foreach ($recentBerita as $berita) : ?>
                                    <li class="media py-2">
                                        <div class="media-body">
                                            <div class="float-right text-muted small"><?= date('d M Y', strtotime($berita['created_at'])) ?></div>
                                            <div class="media-title font-weight-bold"><?= esc($berita['judul']) ?></div>
                                            <span class="text-small text-muted"><?= character_limiter($berita['detail'], 70) ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p class="text-center text-muted">Tidak ada berita terbaru.</p>
                        <?php endif; ?>
                        <div class="text-center mt-3">
                            <a href="<?= base_url('admin/berita') ?>" class="btn btn-outline-primary btn-sm">Lihat Semua Berita</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity: Aktivitas Mahasiswa Terbaru -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title mb-2">Aktivitas Mahasiswa Terbaru</h6>
                        <?php if (!empty($recentStudentActivity)) : ?>
                            <ul class="list-unstyled list-unstyled-border">
                                <?php foreach ($recentStudentActivity as $activity) : ?>
                                    <li class="media py-2">
                                        <div class="media-body">
                                            <div class="float-right text-muted small"><?= date('d M Y', strtotime($activity['created_at'])) ?></div>
                                            <div class="media-title font-weight-bold"><?= esc($activity['judul']) ?></div>
                                            <span class="text-small text-muted"><?= esc(character_limiter($activity['deskripsi'], 70)) ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p class="text-center text-muted">Tidak ada aktivitas residen terbaru.</p>
                        <?php endif; ?>
                        <div class="text-center mt-3">
                            <a href="<?= base_url('admin/student-activity') ?>" class="btn btn-outline-primary btn-sm">Lihat Semua Aktivitas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<!-- Memuat Chart.js dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data untuk Bar Chart: Ringkasan Konten Utama
        const mainContentChartCtx = document.getElementById('mainContentChart').getContext('2d');
        new Chart(mainContentChartCtx, {
            type: 'bar',
            data: {
                labels: ['Pengunjung', 'Berita', 'Aktivitas Mahasiswa'],
                datasets: [{
                    label: 'Jumlah Total',
                    data: [
                        // Menggunakan data pengunjung dari controller
                        <?= $pengunjungHariIni + $pengunjungBulanIni ?>, // Contoh total pengunjung (bisa disesuaikan)
                        <?= $totalBerita ?>,
                        <?= $totalStudentActivity ?>
                    ],
                    backgroundColor: [
                        'rgba(100, 149, 237, 0.8)', // Biru untuk Pengunjung
                        'rgba(255, 99, 132, 0.8)', // Merah untuk Berita
                        'rgba(75, 192, 192, 0.8)' // Hijau untuk Aktivitas
                    ],
                    borderColor: [
                        'rgba(100, 149, 237, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            },
        });

        // Data untuk Bar Chart: Aktivitas Baru (30 Hari Terakhir)
        const recentActivityTrendChartCtx = document.getElementById('recentActivityTrendChart').getContext('2d');
        new Chart(recentActivityTrendChartCtx, {
            type: 'bar', // Menggunakan bar chart untuk kesederhanaan
            data: {
                labels: ['Berita Baru', 'Aktivitas Residen Baru'],
                datasets: [{
                    label: 'Jumlah Baru',
                    data: [
                        <?= $newBerita ?>,
                        <?= $newStudentActivity ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.8)', // Oranye
                        'rgba(153, 102, 255, 0.8)' // Ungu
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            },
        });
    });
</script>
<style>
    /* Custom CSS untuk Dashboard yang Lebih Menarik */
    .card-custom-dashboard {
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        min-height: 150px;
        /* Tinggi minimum untuk konsistensi */
    }

    .card-custom-dashboard:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .card-custom-dashboard .card-body {
        padding-left: 25px;
        padding-right: 20px;
        display: flex;
        align-items: center;
    }

    .card-icon-custom {
        width: 70px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Gradient Backgrounds */
    .bg-gradient-primary {
        background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(45deg, #209cff 0%, #68e0cf 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(45deg, #00b09b 0%, #96c93d 100%);
    }

    /* Tambahan untuk Pengunjung Hari Ini dan Bulan Ini */
    .bg-gradient-purple {
        background: linear-gradient(45deg, #8A2BE2 0%, #9370DB 100%);
        /* Ungu */
    }

    .text-purple {
        color: #8A2BE2;
    }

    .bg-gradient-orange {
        background: linear-gradient(45deg, #FF8C00 0%, #FFA500 100%);
        /* Oranye */
    }

    .text-orange {
        color: #FF8C00;
    }


    .text-small {
        font-size: 0.85em;
        opacity: 0.8;
    }

    /* Style untuk Recent Activity List */
    .list-unstyled-border .media {
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .list-unstyled-border .media:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .list-unstyled-border .media-title {
        font-size: 1.05rem;
    }

    .list-unstyled-border .float-right {
        font-size: 0.8em;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>
<?= $this->endSection() ?>