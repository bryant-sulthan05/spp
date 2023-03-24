<?php
if (!isset($_SESSION['admin'])) {
    $_SESSION['info'] = 'failed';
    echo "
    <script>
        document.location.href = 'index.php?page=login'
    </script>
    ";
}
