# Build ulang setelah ada perubahan kode
docker build -t lovilink-api:test .

# Jalankan container
docker run -d --name lovilink-api -p 3000:3000 --env-file .env lovilink-api:test

# Lihat log
docker logs -f lovilink-api

# Hentikan & hapus
docker stop lovilink-api && docker rm lovilink-api