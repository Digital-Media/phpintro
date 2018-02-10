{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Contact</h2>
            {include file="errorMessages.tpl"}
            {include file="contactForm.tpl"}
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Result in $_POST</h2>
            {if isset($result)}
                <table class="Table u-tableW100">
                    <colgroup span="2" class="u-tableW50"></colgroup>
                    <thead>
                    <tr class="Table-row">
                        <th class="Table-header">Key</th>
                        <th class="Table-header">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $result as $key => $value}
                        <tr class="Table-row">
                            <td class="Table-data">{$key}</td>
                            <td class="Table-data">{$value|escape|nl2br}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            {/if}
        </div>
    </section>
</main>
{include file="footer.tpl"}