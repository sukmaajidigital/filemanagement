@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Dump to Seeder Converter</h1>
        <p class="text-center">
            copyright &copy; <a href="https://github.com/tanmyid">tanmyid</a>
        </p>
        <div class="mb-3">
            <label for="sqlInput" class="form-label">SQL Dump Input:</label>
            <textarea class="form-control" id="sqlInput" placeholder="Masukkan SQL dump di sini..."></textarea>
        </div>
        <div class="mb-3">
            <label for="modelInput" class="form-label">Nama Model (Optional):</label>
            <input type="text" class="form-control" id="modelInput" placeholder="Masukkan nama model... (misal: Tendik)">
        </div>
        <button id="convertButton" class="btn btn-success">Convert</button>
        <div class="mb-3 mt-4">
            <label for="seederOutput" class="form-label">Seeder Output:</label>
            <textarea class="form-control" id="seederOutput" readonly placeholder="Output akan muncul di sini..."></textarea>
            <button id="copyButton" class="btn btn-primary mt-2">Salin</button>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#convertButton').click(function() {
                let sqlInput = $('#sqlInput').val();
                let modelName = $('#modelInput').val() || 'Tendik';
                if ($.trim(sqlInput) === '') {
                    alert('Harap masukkan SQL dump');
                    return;
                }
                // Regex untuk menangkap struktur dasar SQL
                const regex = /INSERT INTO `(\w+)` \(([\w` ,]+)\) VALUES\s*(\([\s\S]+?\);)/i;
            const matches = sqlInput.match(regex);

            if (!matches) {
                alert('Format SQL tidak valid!');
                return;
            }
            // Hapus backticks dari nama kolom dan bagi menjadi array kolom
            let columns = matches[2].replace(/`/g, '').split(', ');
                // Deteksi dan hapus kolom 'id' jika ada
                columns = columns.filter(col => col !== 'id');
                const valuesString = matches[3];
                // Pisahkan baris VALUES berdasarkan ),( dan hilangkan tanda kurung luar
                const values = valuesString.slice(0, -2).split(/\),\s*\(/).map(v => v.replace(/[\(\)]/g, '').trim());
                let seederOutput = `${modelName}::insert([\n`;
                values.forEach(value => {
                    // Gunakan regex untuk memisahkan nilai dengan tepat
                    const valueArray = value.match(/'[^']*'|[^, ]+/g).map(v => v.trim());
                    // Hapus nilai id dari array value jika kolom 'id' dihapus
                    if (matches[2].includes('id')) {
                        valueArray.shift(); // Menghapus nilai pertama (id) dari array
                    }
                    let data = [];
                    columns.forEach((col, i) => {
                        // Memastikan semua nilai yang diambil dari valueArray diapit tanda kutip
                        const valueToInsert = valueArray[i] ? valueArray[i] : "''";
                        data.push(`        '${col}' => ${valueToInsert}`);
                    });
                    // Buat format output sesuai dengan permintaan
                    seederOutput += `    [\n${data.join(',\n')},\n    ],\n`;
                });
                // Hapus baris terakhir yang tidak perlu
                seederOutput += ']);';
                $('#seederOutput').val(seederOutput);
            });
            $('#copyButton').click(function() {
                const output = $('#seederOutput');
                output.select();
                document.execCommand('copy');
                alert('Output berhasil disalin ke clipboard!');
            });
        });
    </script>
@endsection
