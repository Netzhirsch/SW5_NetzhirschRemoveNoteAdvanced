{extends file="parent:frontend/_includes/cookie_permission_note.tpl"}
{namespace name="frontend/cookiepermission/index"}

{block name="cookie_removal_container"}
    <div class="cookie-removal--container">
        <p>
            {s name="cookiePermission/infoText"}{/s}<br>
        </p>
        <ul class="cookie-removal--list">
            <li>{s name="cookiePermission/productToCart"}{/s}</li>
            <li>{s name="cookiePermission/productRecommandations"}{/s}</li>
        </ul>

        {block name="cookie_removal_container_footer"}
            <div class="cookie-removal--footer">
                {$privacyLink = {config name="data_privacy_statement_link"}}
                {if $privacyLink}
                    <a title="{s name="cookiePermission/linkText"}{/s}"
                       class="privacy--notice"
                       href="{$privacyLink}">
                        {s name="cookiePermission/linkText"}{/s}
                    </a>
                {/if}

                <div class="cookie-removal--buttons">
                    <a class="btn is--secondary cookie-permission--accept-button is--center">{s name="cookiePermission/buttonText"}{/s}</a>
                    <a class="btn cookie-permission--close-button is--center">{s name="cookiePermission/close"}{/s}</a>
                </div>
            </div>
        {/block}
    </div>
{/block}
