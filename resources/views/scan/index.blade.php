<div id="reader"></div>

<script>
const scanner = new Html5Qrcode("reader");
scanner.start(
    { facingMode: "environment" },
    { fps: 10, qrbox: 250 },
    async qrCodeMessage => {
        const res = await fetch("{{ route('scan.process') }}", {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ kode_qr: qrCodeMessage })
        });

        const data = await res.json();
        if(data.status){
            alert("Buku : " + data.buku.judul);
            // TO DO: masukin ke keranjang peminjaman
        } else {
            alert(data.msg);
        }
    },
    errorMessage => {}
);
</script>
