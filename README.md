# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[Amazon Linux 2のDockerイメージでApacheを起動する方法と、発生したエラーの解消方法](https://yossi-note.com/how_to_start_apache_in_a_docker_image_on_amazon_linux_2/)

# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/web
docker compose build
docker compose up -d
```

起動したらブラウザで `http://localhost:8080/` にアクセスする。
