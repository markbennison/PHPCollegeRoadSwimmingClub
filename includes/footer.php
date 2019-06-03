
    <hr />
    <p>&copy; College Road Swimming Club</p>
</div> <!-- Closes Main Content Div -->

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php // Flush the buffered output.

    if (isset($database)) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/private/database_functions.php');
        db_disconnect($database);
    }
    ob_end_flush();

?>
