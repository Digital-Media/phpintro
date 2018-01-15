{include file="header.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Login to {$smarty.const.TITLE}</h2>
            {include file="errorMessages.tpl"}
            {include file="statusMessage.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="Grid Grid--gutters">
                    <div class="InputCombo Grid-full">
                        <label for="{$username->getName()}" class="InputCombo-label">User Name*</label>
                        <input type="text" id="{$username->getName()}" name="{$username->getName()}"
                               value="{$username->getValue()}" class="InputCombo-field">
                    </div>
                    <div class="InputCombo Grid-full">
                        <label for="{$passwordKey}" class="InputCombo-label">Password*</label>
                        <input type="password" id="{$passwordKey}" name="{$passwordKey}" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Log me in</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">No Account?</h2>
            <p>Register your {$smarty.const.TITLE} account <a href="{$smarty.const.REGISTER}">here.</a></p>
        </div>
    </section>
</main>
{include file="footer.tpl"}