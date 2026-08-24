<style> 
    .sidebar { 
        display: flex; 
        flex-direction: row; 
        align-items: center;

        background-color: #07152B; 
        color: white; 
        padding: 1.2rem; 

        width: 100%; 
        box-sizing: border-box;
    } 
 
    .sidebar a { 
        color: white; 
        margin-right: 3rem; 
    }

    @media (max-width: 1000px) {
        .sidebar {
            padding: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .sidebar a {
            margin-right: 0;
        }
    }
</style>

<section>
    <div class="sidebar">
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="cadastrados.php">CADASTRADOS</a>
        <a href="logout.php">ENCERRAR</a>
    </div>
</section>