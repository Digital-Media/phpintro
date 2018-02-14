{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Demo Page</h2>
            {include file="errorMessages.tpl"}
            {include file="statusMessage.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post">
                <div class="Grid Grid--gutters">
                    <div class="InputCombo Grid-full">
                        <label for="{$demofield->getName()}" class="InputCombo-label">Demo Field*:</label>
                        <input type="text" id="{$demofield->getName()}" name="{$demofield->getName()}" value="{$demofield->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Demo Text</h2>
            {if isset($result)}
                <table class="Table u-tableW100">
                    <colgroup span="2" class="u-tableW50"></colgroup>
                    <thead>
                    <tr class="Table-row">
                        <th class="Table-header">Demo Field</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=cid item=con from=$result}
                        <tr class="Table-row">
                            <td class="Table-data">{$con.demofield}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            {/if}
        </div>
    </section>
</main>
{include file="footer.tpl"}