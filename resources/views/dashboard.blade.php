<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ServiceHub — Bengkel Motor</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
:root{--ink:#172033;--muted:#758096;--line:#e9edf4;--bg:#f5f7fb;--navy:#17243a;--blue:#356df3;--blue2:#2458dc;--mint:#e8f8f2;--orange:#fff3e6}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font-family:"DM Sans",sans-serif;font-size:14px}
.navbar{height:74px;background:#fff;border-bottom:1px solid var(--line);box-shadow:0 3px 18px #192b4a08}
.brand-mark{width:40px;height:40px;border-radius:13px;background:linear-gradient(135deg,#356df3,#6c91ff);display:grid;place-items:center;color:#fff;font-size:20px;box-shadow:0 7px 16px #356df344}
.brand-name{font-family:Manrope,sans-serif;font-weight:800;letter-spacing:-.5px;font-size:17px}.brand-sub{font-size:11px;color:var(--muted);margin-top:-2px}
.top-chip{border:1px solid var(--line);background:#fff;padding:8px 12px;border-radius:30px;color:#5c6880;font-size:12px}
.page-wrap{max-width:1440px;margin:auto;padding:28px 24px 48px}
.welcome{background:linear-gradient(115deg,#17243a 0%,#263e65 62%,#356df3 100%);border-radius:22px;padding:30px 34px;color:white;position:relative;overflow:hidden;box-shadow:0 14px 35px #1b37611c}
.welcome:after{content:"";position:absolute;width:300px;height:300px;border:1px solid #ffffff20;border-radius:50%;right:70px;top:-170px;box-shadow:0 0 0 35px #ffffff08,0 0 0 70px #ffffff06}
.welcome-content{position:relative;z-index:1}.eyebrow{text-transform:uppercase;letter-spacing:1.5px;font-size:10px;font-weight:800;color:#b9ccff}
.welcome h1{font:800 27px Manrope,sans-serif;letter-spacing:-.8px;margin:8px 0}.welcome p{color:#d5def0;margin:0;max-width:580px}
.hero-icon{position:absolute;right:11%;bottom:-20px;font-size:132px;color:#ffffff18;transform:rotate(-15deg)}
.stats{margin-top:22px}.stat-card{background:#fff;border:1px solid var(--line);border-radius:17px;padding:18px 19px;display:flex;align-items:center;gap:14px;height:100%;box-shadow:0 5px 18px #192b4a06}
.stat-icon{width:43px;height:43px;border-radius:14px;display:grid;place-items:center;font-size:19px}.stat-label{color:var(--muted);font-size:12px;font-weight:600}.stat-number{font:800 24px Manrope,sans-serif;margin-top:2px;letter-spacing:-.7px}
.stat-blue{background:#edf2ff;color:#356df3}.stat-green{background:#e8f8f2;color:#15976c}.stat-orange{background:#fff3e6;color:#e58b2c}.stat-purple{background:#f2edff;color:#8661df}
.section-nav{display:flex;gap:8px;overflow-x:auto;padding:5px 0 17px;margin-top:24px}
.section-nav a{white-space:nowrap;text-decoration:none;color:#68758c;border:1px solid var(--line);background:#fff;padding:9px 14px;border-radius:30px;font-weight:700;font-size:12px;transition:.2s}
.section-nav a:hover{background:#edf2ff;color:var(--blue);border-color:#dce5ff}
.section-card{border:1px solid var(--line);border-radius:18px;background:#fff;box-shadow:0 5px 20px #192b4a07;margin-bottom:20px;overflow:hidden}
.section-head{padding:21px 23px 16px;display:flex;align-items:center;justify-content:space-between;gap:12px;border-bottom:1px solid #f0f2f6}
.section-heading{display:flex;align-items:center;gap:12px}.section-symbol{width:39px;height:39px;border-radius:12px;display:grid;place-items:center;background:#edf2ff;color:var(--blue);font-size:18px}
.section-title{font:800 16px Manrope,sans-serif;margin:0;letter-spacing:-.3px}.section-desc{font-size:11px;color:var(--muted);margin-top:3px}
.section-count{font-size:11px;font-weight:700;background:#f3f5f9;color:#657188;border-radius:30px;padding:6px 10px}
.section-body{padding:22px 23px}
.form-label{font-size:12px;font-weight:700;color:#45516a;margin-bottom:7px}.form-control,.form-select{border:1px solid #e1e6ef;border-radius:10px;padding:10px 12px;font-size:13px;min-height:42px;color:#28344b;background-color:#fff}
.form-control:focus,.form-select:focus{border-color:#8eacff;box-shadow:0 0 0 3px #356df318}
textarea.form-control{min-height:82px}.radio-wrap{height:42px;display:flex;align-items:center;gap:18px;padding:0 12px;border:1px solid #e1e6ef;border-radius:10px}
.form-check-input:checked{background-color:var(--blue);border-color:var(--blue)}.form-check-label{font-size:12px;color:#45516a}
.btn-primary{background:var(--blue);border-color:var(--blue);border-radius:10px;padding:10px 16px;font-size:12px;font-weight:700;box-shadow:0 5px 12px #356df326}.btn-primary:hover{background:var(--blue2);border-color:var(--blue2)}
.btn-success{border-radius:10px;padding:10px 16px;font-size:12px;font-weight:700}.btn-outline-danger{border-radius:8px}
.table-wrap{border:1px solid #edf0f5;border-radius:12px;overflow:auto;margin-top:20px}.table{margin:0;white-space:nowrap;font-size:12px}.table thead th{background:#f7f9fc;color:#718098;text-transform:uppercase;letter-spacing:.55px;font-size:10px;font-weight:800;border-bottom:1px solid #e9edf4;padding:13px 14px}.table tbody td{padding:13px 14px;color:#45516a;border-color:#f0f2f6}.table tbody tr:hover{background:#fbfcff}.id-pill{font-weight:800;color:#356df3;background:#edf2ff;padding:5px 8px;border-radius:7px}.empty-state{padding:24px!important;text-align:center;color:#98a2b3!important}
.alert{border:0;border-radius:12px;font-size:13px}.help-text{font-size:11px;color:#8a95a8;margin-top:5px}.footer{color:#98a2b3;text-align:center;font-size:11px;padding:12px 0 0}
@media(max-width:768px){.page-wrap{padding:18px 13px 35px}.welcome{padding:24px 22px}.welcome h1{font-size:22px}.hero-icon{right:-5px;font-size:100px}.section-head,.section-body{padding-left:17px;padding-right:17px}.top-chip{display:none}}
</style>
</head>
<body>
<nav class="navbar">
 <div class="container-fluid px-4" style="max-width:1440px">
  <div class="d-flex align-items-center gap-3">
   <div class="brand-mark"><i class="bi bi-wrench-adjustable-circle"></i></div>
   <div><div class="brand-name">ServiceHub</div><div class="brand-sub">Motorcycle service management</div></div>
  </div>
  <div class="d-flex align-items-center gap-2"><span class="top-chip"><i class="bi bi-shield-check me-1"></i> Local workspace</span><span class="top-chip"><i class="bi bi-calendar3 me-1"></i> {{ now()->format('d M Y') }}</span></div>
 </div>
</nav>
<main class="page-wrap">
 <div class="welcome">
  <div class="welcome-content">
   <div class="eyebrow">Workshop management system</div>
   <h1>Selamat datang di ServiceHub</h1>
   <p>Kelola pelanggan, kendaraan, proses perawatan, hingga pembayaran bengkel dalam satu dashboard yang terintegrasi.</p>
  </div>
  <i class="bi bi-speedometer2 hero-icon"></i>
 </div>

 <div class="row g-3 stats">
  <div class="col-6 col-xl-3"><div class="stat-card"><div class="stat-icon stat-blue"><i class="bi bi-people"></i></div><div><div class="stat-label">Total Pelanggan</div><div class="stat-number">{{ $customers->count() }}</div></div></div></div>
  <div class="col-6 col-xl-3"><div class="stat-card"><div class="stat-icon stat-green"><i class="bi bi-bicycle"></i></div><div><div class="stat-label">Total Kendaraan</div><div class="stat-number">{{ $vehicles->count() }}</div></div></div></div>
  <div class="col-6 col-xl-3"><div class="stat-card"><div class="stat-icon stat-orange"><i class="bi bi-clipboard2-check"></i></div><div><div class="stat-label">Daftar Service</div><div class="stat-number">{{ $registrations->count() }}</div></div></div></div>
  <div class="col-6 col-xl-3"><div class="stat-card"><div class="stat-icon stat-purple"><i class="bi bi-wallet2"></i></div><div><div class="stat-label">Transaksi Pembayaran</div><div class="stat-number">{{ $payments->count() }}</div></div></div></div>
 </div>

 <div class="section-nav">
  <a href="#pelanggan"><i class="bi bi-people me-1"></i> Pelanggan</a><a href="#kendaraan"><i class="bi bi-bicycle me-1"></i> Kendaraan</a><a href="#daftar-service"><i class="bi bi-clipboard2-plus me-1"></i> Daftar Service</a><a href="#data-service"><i class="bi bi-tools me-1"></i> Data Service</a><a href="#pembayaran"><i class="bi bi-credit-card me-1"></i> Pembayaran</a>
 </div>

 @if(session('success'))<div class="alert alert-success"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>@endif
 @if($errors->any())<div class="alert alert-danger"><strong><i class="bi bi-exclamation-circle me-2"></i>Data belum dapat disimpan.</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

 <section class="section-card" id="pelanggan">
  <div class="section-head"><div class="section-heading"><div class="section-symbol"><i class="bi bi-people"></i></div><div><h2 class="section-title">Data Pelanggan</h2><div class="section-desc">Informasi identitas dan kontak pelanggan bengkel</div></div></div><span class="section-count">{{ $customers->count() }} data</span></div>
  <div class="section-body">
   <form method="POST" action="{{ route('pelanggan.store') }}" class="row g-3">@csrf
    <div class="col-md-6"><label class="form-label">Nama lengkap</label><input name="nama_lengkap" class="form-control" placeholder="Masukkan nama pelanggan" required></div>
    <div class="col-md-6"><label class="form-label">No HP</label><input name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required></div>
    <div class="col-md-6"><label class="form-label">Alamat pelanggan</label><textarea name="alamat" class="form-control" placeholder="Alamat lengkap pelanggan" required></textarea></div>
    <div class="col-md-6"><label class="form-label">Pekerjaan</label><input name="pekerjaan" class="form-control" placeholder="Contoh: Pelajar / Wiraswasta" required></div>
    <div class="col-12"><button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Simpan Pelanggan</button></div>
   </form>
   <div class="table-wrap"><table class="table table-hover"><thead><tr><th>ID</th><th>Nama Lengkap</th><th>No HP</th><th>Alamat</th><th>Pekerjaan</th><th>Aksi</th></tr></thead><tbody>
   @forelse($customers as $c)<tr><td><span class="id-pill">#{{ $c->id }}</span></td><td class="fw-bold text-dark">{{ $c->nama_lengkap }}</td><td>{{ $c->no_hp }}</td><td>{{ $c->alamat }}</td><td>{{ $c->pekerjaan }}</td><td><form method="POST" action="{{ route('data.destroy',['type'=>'pelanggan','id'=>$c->id]) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pelanggan ini?')"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="6" class="empty-state">Belum ada data pelanggan.</td></tr>@endforelse
   </tbody></table></div>
  </div>
 </section>

 <section class="section-card" id="kendaraan">
  <div class="section-head"><div class="section-heading"><div class="section-symbol"><i class="bi bi-bicycle"></i></div><div><h2 class="section-title">Data Kendaraan</h2><div class="section-desc">Data motor yang terdaftar pada bengkel</div></div></div><span class="section-count">{{ $vehicles->count() }} data</span></div>
  <div class="section-body">
   <form method="POST" action="{{ route('kendaraan.store') }}" class="row g-3">@csrf
    <div class="col-md-4"><label class="form-label">No Plat Kendaraan</label><input name="no_plat" class="form-control" placeholder="BL 1234 XX" required></div>
    <div class="col-md-4"><label class="form-label">No STNK</label><input name="no_stnk" class="form-control" placeholder="Nomor STNK" required></div>
    <div class="col-md-4"><label class="form-label">Tahun Pembuatan Kendaraan</label><input type="number" name="tahun_pembuatan" class="form-control" min="1950" max="{{ date('Y')+1 }}" placeholder="2022" required></div>
    <div class="col-md-4"><label class="form-label d-block">Jenis Kendaraan</label><div class="radio-wrap"><label class="form-check-label"><input class="form-check-input me-1" type="radio" name="jenis_kendaraan" value="Matic" required> Matic</label><label class="form-check-label"><input class="form-check-input me-1" type="radio" name="jenis_kendaraan" value="Manual Transmisi"> Manual Transmisi</label></div></div>
    <div class="col-md-4"><label class="form-label">Nama Pemilik</label><input name="nama_pemilik" class="form-control" placeholder="Nama pemilik kendaraan" required></div>
    <div class="col-md-4"><label class="form-label">Warna Kendaraan</label><input name="warna" class="form-control" placeholder="Contoh: Hitam" required></div>
    <div class="col-12"><button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Simpan Kendaraan</button></div>
   </form>
   <div class="table-wrap"><table class="table table-hover"><thead><tr><th>ID</th><th>No Plat</th><th>Jenis</th><th>No STNK</th><th>Tahun</th><th>Pemilik</th><th>Warna</th><th>Aksi</th></tr></thead><tbody>
   @forelse($vehicles as $v)<tr><td><span class="id-pill">#{{ $v->id }}</span></td><td class="fw-bold text-dark">{{ $v->no_plat }}</td><td>{{ $v->jenis_kendaraan }}</td><td>{{ $v->no_stnk }}</td><td>{{ $v->tahun_pembuatan }}</td><td>{{ $v->nama_pemilik }}</td><td>{{ $v->warna }}</td><td><form method="POST" action="{{ route('data.destroy',['type'=>'kendaraan','id'=>$v->id]) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kendaraan ini?')"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="8" class="empty-state">Belum ada data kendaraan.</td></tr>@endforelse
   </tbody></table></div>
  </div>
 </section>

 <section class="section-card" id="daftar-service">
  <div class="section-head"><div class="section-heading"><div class="section-symbol"><i class="bi bi-clipboard2-plus"></i></div><div><h2 class="section-title">Daftar Service</h2><div class="section-desc">Pendaftaran motor dan keluhan sebelum pengerjaan</div></div></div><span class="section-count">{{ $registrations->count() }} data</span></div>
  <div class="section-body">
   <form method="POST" action="{{ route('daftar-service.store') }}" class="row g-3">@csrf
    <div class="col-md-4"><label class="form-label">No Plat Kendaraan</label><select name="kendaraan_id" class="form-select" required><option value="">Pilih kendaraan</option>@foreach($vehicles as $v)<option value="{{ $v->id }}">{{ $v->no_plat }} — {{ $v->nama_pemilik }}</option>@endforeach</select></div>
    <div class="col-md-4"><label class="form-label">ID Pelanggan</label><select name="pelanggan_id" id="customerSelect" class="form-select" required><option value="">Pilih pelanggan</option>@foreach($customers as $c)<option value="{{ $c->id }}" data-name="{{ $c->nama_lengkap }}">#{{ $c->id }} — {{ $c->nama_lengkap }}</option>@endforeach</select></div>
    <div class="col-md-4"><label class="form-label">Nama pelanggan (otomatis)</label><input id="customerName" class="form-control" readonly placeholder="Terisi otomatis"></div>
    <div class="col-md-8"><label class="form-label">Keluhan kendaraan</label><textarea name="keluhan" class="form-control" placeholder="Jelaskan keluhan kendaraan" required></textarea></div>
    <div class="col-md-4"><label class="form-label">Tanggal service</label><input type="date" name="tanggal_service" class="form-control" required></div>
    <div class="col-12"><button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Simpan Daftar Service</button></div>
   </form>
   <div class="table-wrap"><table class="table table-hover"><thead><tr><th>ID Service</th><th>Plat Kendaraan</th><th>ID Pelanggan</th><th>Nama Pelanggan</th><th>Keluhan</th><th>Tanggal</th><th>Aksi</th></tr></thead><tbody>
   @forelse($registrations as $r)<tr><td><span class="id-pill">#{{ $r->id }}</span></td><td class="fw-bold text-dark">{{ $r->vehicle->no_plat }}</td><td>{{ $r->customer->id }}</td><td>{{ $r->customer->nama_lengkap }}</td><td>{{ $r->keluhan }}</td><td>{{ $r->tanggal_service->format('d-m-Y') }}</td><td><form method="POST" action="{{ route('data.destroy',['type'=>'daftar-service','id'=>$r->id]) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus daftar service ini?')"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="7" class="empty-state">Belum ada daftar service.</td></tr>@endforelse
   </tbody></table></div>
  </div>
 </section>

 <section class="section-card" id="data-service">
  <div class="section-head"><div class="section-heading"><div class="section-symbol"><i class="bi bi-tools"></i></div><div><h2 class="section-title">Data Service</h2><div class="section-desc">Catatan estimasi, mekanik, dan sparepart pengganti</div></div></div><span class="section-count">{{ $details->count() }} data</span></div>
  <div class="section-body">
   <form method="POST" action="{{ route('data-service.store') }}" class="row g-3">@csrf
    <div class="col-md-6"><label class="form-label">ID Service Pelanggan</label><select name="daftar_service_id" id="registrationSelect" class="form-select" required><option value="">Pilih ID service</option>@foreach($registrations as $r)<option value="{{ $r->id }}" data-complaint="{{ $r->keluhan }}">#{{ $r->id }} — {{ $r->customer->nama_lengkap }} ({{ $r->vehicle->no_plat }})</option>@endforeach</select></div>
    <div class="col-md-6"><label class="form-label">Keluhan kendaraan (otomatis)</label><input id="complaintField" class="form-control" readonly placeholder="Terisi otomatis"></div>
    <div class="col-md-6"><label class="form-label">Estimasi service</label><textarea name="estimasi_service" class="form-control" placeholder="Contoh: Pemeriksaan CVT dan penggantian oli" required></textarea></div>
    <div class="col-md-6"><label class="form-label">Nama mekanik</label><input name="nama_mekanik" class="form-control" placeholder="Nama mekanik" required></div>
    <div class="col-12"><label class="form-label">Sparepart pengganti</label><textarea name="sparepart_pengganti" class="form-control" placeholder="Isi jika ada sparepart yang diganti"></textarea></div>
    <div class="col-12"><button class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Simpan Data Service</button></div>
   </form>
   <div class="table-wrap"><table class="table table-hover"><thead><tr><th>ID</th><th>ID Daftar</th><th>Keluhan</th><th>Estimasi</th><th>Mekanik</th><th>Sparepart</th><th>Aksi</th></tr></thead><tbody>
   @forelse($details as $d)<tr><td><span class="id-pill">#{{ $d->id }}</span></td><td>{{ $d->daftar_service_id }}</td><td>{{ $d->registration->keluhan }}</td><td>{{ $d->estimasi_service }}</td><td>{{ $d->nama_mekanik }}</td><td>{{ $d->sparepart_pengganti }}</td><td><form method="POST" action="{{ route('data.destroy',['type'=>'data-service','id'=>$d->id]) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data service ini?')"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="7" class="empty-state">Belum ada data service.</td></tr>@endforelse
   </tbody></table></div>
  </div>
 </section>

 <section class="section-card" id="pembayaran">
  <div class="section-head"><div class="section-heading"><div class="section-symbol"><i class="bi bi-credit-card"></i></div><div><h2 class="section-title">Pembayaran Service</h2><div class="section-desc">Pencatatan biaya dan metode pembayaran pelanggan</div></div></div><span class="section-count">{{ $payments->count() }} transaksi</span></div>
  <div class="section-body">
   <form method="POST" action="{{ route('pembayaran.store') }}" class="row g-3">@csrf
    <div class="col-md-6"><label class="form-label">ID Service Pelanggan</label><select name="daftar_service_id" class="form-select" required><option value="">Pilih ID service</option>@foreach($registrations as $r)<option value="{{ $r->id }}">#{{ $r->id }} — {{ $r->customer->nama_lengkap }} ({{ $r->vehicle->no_plat }})</option>@endforeach</select></div>
    <div class="col-md-6"><label class="form-label">Jumlah biaya servis (Rupiah)</label><input type="number" name="jumlah_biaya" min="0" class="form-control" placeholder="Contoh: 150000" required></div>
    <div class="col-md-6"><label class="form-label d-block">Jenis Pembayaran</label><div class="radio-wrap"><label class="form-check-label"><input class="form-check-input me-1" type="radio" name="jenis_pembayaran" value="Cash" required> Cash / Tunai</label><label class="form-check-label"><input class="form-check-input me-1" type="radio" name="jenis_pembayaran" value="Non Tunai"> Non Tunai</label></div></div>
    <div class="col-md-6"><label class="form-label">Keterangan</label><textarea name="keterangan" class="form-control" placeholder="Catatan pembayaran (opsional)"></textarea></div>
    <div class="col-12"><button class="btn btn-success"><i class="bi bi-check2-circle me-1"></i> Simpan Pembayaran</button></div>
   </form>
   <div class="table-wrap"><table class="table table-hover"><thead><tr><th>ID</th><th>ID Service</th><th>Pelanggan</th><th>Biaya</th><th>Jenis Pembayaran</th><th>Keterangan</th><th>Aksi</th></tr></thead><tbody>
   @forelse($payments as $p)<tr><td><span class="id-pill">#{{ $p->id }}</span></td><td>{{ $p->daftar_service_id }}</td><td class="fw-bold text-dark">{{ $p->registration->customer->nama_lengkap }}</td><td class="fw-bold">Rp {{ number_format($p->jumlah_biaya,0,',','.') }}</td><td>{{ $p->jenis_pembayaran }}</td><td>{{ $p->keterangan }}</td><td><form method="POST" action="{{ route('data.destroy',['type'=>'pembayaran','id'=>$p->id]) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pembayaran ini?')"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="7" class="empty-state">Belum ada transaksi pembayaran.</td></tr>@endforelse
   </tbody></table></div>
  </div>
 </section>
 <div class="footer">© {{ date('Y') }} ServiceHub · Aplikasi Manajemen Bengkel Motor</div>
</main>
<script>
document.getElementById('customerSelect')?.addEventListener('change',function(){const o=this.options[this.selectedIndex];document.getElementById('customerName').value=o.dataset.name||'';});
document.getElementById('registrationSelect')?.addEventListener('change',function(){const o=this.options[this.selectedIndex];document.getElementById('complaintField').value=o.dataset.complaint||'';});
</script>
</body>
</html>
