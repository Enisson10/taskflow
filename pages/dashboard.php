<p>
    <strong>Prioridade:</strong>

    <?php if($task['priority'] == 'alta'): ?>
        <span style="color:red;">
            🔴 Alta
        </span>

    <?php elseif($task['priority'] == 'media'): ?>
        <span style="color:orange;">
            🟠 Média
        </span>

    <?php else: ?>
        <span style="color:green;">
            🟢 Baixa
        </span>

    <?php endif; ?>
</p>
