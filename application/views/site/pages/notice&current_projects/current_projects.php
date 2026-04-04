<?php
$current_projects = $this->db->order_by('created_at', 'DESC')
    -> where('status',1)
    ->get('current_projects')
    ->result_array();
?>

<div class="current-projects">
    <h3><i class="fas fa-tasks"></i> বিজ্ঞপ্তি</h3>
    <div class="project-viewport">
        <div class="project-list-scroll" id="projectList">


            <?php if (!empty($current_projects)): ?>
                <?php foreach ($current_projects as $row): ?>
                    <div class="project-item-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Government_Seal_of_Bangladesh.svg"
                            alt="Project">
                        <div class="p-info">
                            <h4><?= $row['title']; ?></h4>
                            <p><?= $row['details']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No news available</li>
            <?php endif; ?>


        </div>
    </div>
</div>



<style>
    .project-viewport {
        width: 100%;
        height: 300px;
        overflow: hidden;
    }

    .project-list-scroll {
        height: 100%;
        overflow-y: scroll;
        scroll-behavior: auto;
    }
</style>



<script>
    const projectList = document.getElementById('projectList');

    projectList.innerHTML += projectList.innerHTML;

    let scrollSpeed = 1;

    function autoScroll() {
        projectList.scrollTop += scrollSpeed;

       if (projectList.scrollTop >= projectList.scrollHeight / 2) {
    projectList.scrollTop = 0;
}
    }

    setInterval(autoScroll, 30);
</script>