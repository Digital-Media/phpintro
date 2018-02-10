{if isset($errorMessages) && count($errorMessages) > 0}
    <div class="Error">
        <ul class="Error-list">
            {foreach $errorMessages as $error}
                <li class="Error-listItem">{$error}</li>
            {/foreach}
        </ul>
    </div>
{/if}
