<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Pendataan Jemaat
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->index();
            $table->text('alamat')->nullable();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('telepon')->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('status_anggota', ['Aktif', 'Pindah', 'Meninggal'])->default('Aktif');
            $table->date('tanggal_bergabung');
            $table->date('last_data_update')->nullable(); // For annual update reminder
            $table->timestamps();
        });

        // 2. Pendataan Sakramen
        Schema::create('sakramen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaat')->onDelete('cascade');
            $table->enum('jenis_sakramen', ['Baptis', 'Komuni', 'Krisma', 'Pernikahan', 'Kematian']);
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->string('pendeta_pelayan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->index(['jemaat_id', 'jenis_sakramen']);
        });

        // 3. Manajemen Jadwal Pelayanan
        Schema::create('jadwal_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->dateTime('waktu_mulai')->index();
            $table->dateTime('waktu_selesai');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 4. Pembagian Tugas Pelayanan (Pivot table style with roles)
        Schema::create('petugas_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_pelayanan_id')->constrained('jadwal_pelayanan')->onDelete('cascade');
            $table->foreignId('jemaat_id')->constrained('jemaat')->onDelete('cascade');
            $table->string('peran'); // e.g., 'Pendeta', 'Singer', 'Multimedia'
            $table->timestamps();
        });

        // 5. Pengelolaan Inventaris
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique()->index();
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->date('tanggal_pengadaan');
            $table->decimal('nilai_perolehan', 15, 2)->default(0);
            $table->timestamps();
        });

        // 6. Pengelolaan Keuangan
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi')->unique()->index(); // Added unique transaction number
            $table->enum('tipe', ['Pemasukan', 'Pengeluaran']);
            $table->string('kategori'); // e.g., 'Persembahan Mingguan', 'Biaya Listrik'
            $table->decimal('jumlah', 15, 2);
            $table->date('tanggal_transaksi')->index();
            $table->text('keterangan')->nullable();
            $table->foreignId('created_by')->constrained('users'); // Audit trail
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuangan');
        Schema::dropIfExists('inventaris');
        Schema::dropIfExists('petugas_pelayanan');
        Schema::dropIfExists('jadwal_pelayanan');
        Schema::dropIfExists('sakramen');
        Schema::dropIfExists('jemaat');
    }
};
