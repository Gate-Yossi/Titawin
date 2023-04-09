# Titawin
[よっしーノート](https://yossi-note.com/)に記載のソースを管理しているリポジトリです。

# URL

[CodeIgniterの環境構築方法：xdebugの導入](https://yossi-note.com/codeigniter_environment_construction_method_installing_xdebug/)
# Usage

```bash
git clone git@github.com:Gate-Yossi/Titawin.git
cd Titawin/db
docker compose build
docker compose up -d
```

ブラウザで `http://localhost:8080/Blog` にアクセスする。

# Xhprof

ブラウザで `http://localhost:8080/xhprof/?dir=/var/log/xhprof` にアクセスする。
