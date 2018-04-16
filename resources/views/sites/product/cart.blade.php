@extends('layouts.sites.master')
@section('title', trans('sites.cart'))
@section('content')
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" itemprop="mainContentOfPage">
                    <article id="post-11" class="post-11 page type-page status-publish hentry no-post-thumbnail entry"
                             itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <h1 class="page-title" itemprop="headline"> @lang('sites.carts.cart') </h1>
                        <div class="entry-content" itemprop="text">
                            <div class="woocommerce">
                                <div class="woocommerce-message">
                                    <a href="https://goatstee.com/product/im-the-juan-for-you-funny-cinco-de-mayo-saying-t-shirt/"
                                       class="button wc-forward"> @lang('sites.carts.continue') </a> &ldquo;Im The Juan For You
                                    &#8211; Funny Cinco De Mayo Saying T-shirt&rdquo; @lang('sites.carts.added')
                                </div>
                                {!! Form::open([
                                    'method' => 'POST'
                                ]) !!}
                                    <table class="shop_table shop_table_responsive cart" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name"> @lang('sites.carts.product') </th>
                                            <th class="product-price"> @lang('sites.carts.price') </th>
                                            <th class="product-quantity"> @lang('sites.carts.quantity') </th>
                                            <th class="product-subtotal"> @lang('sites.carts.total') </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="https://goatstee.com/cart/?remove_item=4ddc6de999a7bac91a4fe47e0b59d688&#038;_wpnonce=1d9dc3b6d5"
                                                   class="remove" title="Remove this item" data-product_id="2779088" data-product_sku="">&times;
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="https://goatstee.com/product/armed-forces-day-honor-their-sacrifice-military-t-shirt/?attribute_color=Navy&#038;attribute_size=S&#038;attribute_fit-type=Men">
                                                    <!-- Featured Image From URL plugin -->
                                                    <img src="https://images-na.ssl-images-amazon.com/images/I/719CEpJe6JL._UL1500_.jpg?fifu"
                                                         alt="Armed Forces Day Honor Their Sacrifice Military T-shirt"></img>
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="https://goatstee.com/product/armed-forces-day-honor-their-sacrifice-military-t-shirt/?attribute_color=Navy&#038;attribute_size=S&#038;attribute_fit-type=Men">Armed
                                                    Forces Day Honor Their Sacrifice Military T-shirt</a>
                                                <dl class="variation">
                                                    <dt class="variation-Color"> @lang('sites.product.color'):</dt>
                                                    <dd class="variation-Color"><p>Navy</p>
                                                    </dd>
                                                    <dt class="variation-Size"> @lang('sites.product.size'):</dt>
                                                    <dd class="variation-Size"><p>S</p>
                                                    </dd>
                                                    <dt class="variation-FitType"> @lang('sites.product.type'):</dt>
                                                    <dd class="variation-FitType"><p>Men</p>
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>17.95
                                                </span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="number" step="1" min="0" max="" name="cart[4ddc6de999a7bac91a4fe47e0b59d688][qty]" value="1"
                                                       title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"/>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>17.95</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a href="https://goatstee.com/cart/?remove_item=86b33525aa9190fc5e49679c359a36fe&#038;_wpnonce=1d9dc3b6d5"
                                                   class="remove" title="Remove this item" data-product_id="2779007" data-product_sku="">&times;
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="https://goatstee.com/product/im-the-juan-for-you-funny-cinco-de-mayo-saying-t-shirt/?attribute_color=Navy&#038;attribute_size=S&#038;attribute_fit-type=Men">
                                                    <!-- Featured Image From URL plugin -->
                                                    <img src="https://images-na.ssl-images-amazon.com/images/I/71S4j0oPE+L._UL1500_.jpg?fifu"
                                                         alt="Im The Juan For You - Funny Cinco De Mayo Saying T-shirt"></img>
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="https://goatstee.com/product/im-the-juan-for-you-funny-cinco-de-mayo-saying-t-shirt/?attribute_color=Navy&#038;attribute_size=S&#038;attribute_fit-type=Men">Im
                                                    The Juan For You - Funny Cinco De Mayo Saying T-shirt</a>
                                                <dl class="variation">
                                                    <dl class="variation">
                                                        <dt class="variation-Color"> @lang('sites.product.color'):</dt>
                                                        <dd class="variation-Color"><p>Navy</p>
                                                        </dd>
                                                        <dt class="variation-Size"> @lang('sites.product.size'):</dt>
                                                        <dd class="variation-Size"><p>S</p>
                                                        </dd>
                                                        <dt class="variation-FitType"> @lang('sites.product.type'):</dt>
                                                        <dd class="variation-FitType"><p>Men</p>
                                                        </dd>
                                                    </dl>
                                                </dl>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>17.95
                                                </span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="number" step="1" min="0" max="" name="cart[86b33525aa9190fc5e49679c359a36fe][qty]" value="1"
                                                           title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"/>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>17.95</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="actions">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                                           value="" placeholder="Coupon code"/>
                                                    <input type="submit" class="button" name="apply_coupon" value="Apply Coupon"/>
                                                </div>
                                                <input type="submit" class="button" name="update_cart" value="Update Cart"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                {!! Form::close() !!}
                                <div class="cart-collaterals">
                                    <div class="cart_totals calculated_shipping">
                                        <h2> @lang('sites.carts.cart_total') </h2>
                                        <table cellspacing="0" class="shop_table shop_table_responsive">
                                            <tr class="cart-subtotal">
                                                <th> @lang('sites.carts.subtotal') </th>
                                                <td data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>35.90
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th> @lang('sites.carts.shipping') </th>
                                                <td data-title="Shipping">
                                                    @lang('sites.carts.flat_rate'): <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span>8.90</span>
                                                    <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="flat_rate:3" class="shipping_method"/>
                                                    <form class="woocommerce-shipping-calculator" action="https://goatstee.com/cart/" method="post">
                                                        <section class="shipping-calculator-form" style="display:none;">
                                                            <p class="form-row form-row-wide"
                                                               id="calc_shipping_country_field">
                                                                <select name="calc_shipping_country" id="calc_shipping_country"
                                                                        class="country_to_state" rel="calc_shipping_state">
                                                                    <option value="">Select a country&hellip;</option>
                                                                    <option value="AX">&#197;land Islands</option>
                                                                    <option value="AF">Afghanistan</option>
                                                                    <option value="AL">Albania</option>
                                                                    <option value="DZ">Algeria</option>
                                                                    <option value="AS">American Samoa</option>
                                                                    <option value="AD">Andorra</option>
                                                                    <option value="AO">Angola</option>
                                                                    <option value="AI">Anguilla</option>
                                                                    <option value="AQ">Antarctica</option>
                                                                    <option value="AG">Antigua and Barbuda</option>
                                                                    <option value="AR">Argentina</option>
                                                                    <option value="AM">Armenia</option>
                                                                    <option value="AW">Aruba</option>
                                                                    <option value="AU">Australia</option>
                                                                    <option value="AT">Austria</option>
                                                                    <option value="AZ">Azerbaijan</option>
                                                                    <option value="BS">Bahamas</option>
                                                                    <option value="BH">Bahrain</option>
                                                                    <option value="BD">Bangladesh</option>
                                                                    <option value="BB">Barbados</option>
                                                                    <option value="BY">Belarus</option>
                                                                    <option value="PW">Belau</option>
                                                                    <option value="BE">Belgium</option>
                                                                    <option value="BZ">Belize</option>
                                                                    <option value="BJ">Benin</option>
                                                                    <option value="BM">Bermuda</option>
                                                                    <option value="BT">Bhutan</option>
                                                                    <option value="BO">Bolivia</option>
                                                                    <option value="BQ">Bonaire, Saint Eustatius and Saba
                                                                    </option>
                                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                                    <option value="BW">Botswana</option>
                                                                    <option value="BV">Bouvet Island</option>
                                                                    <option value="BR">Brazil</option>
                                                                    <option value="IO">British Indian Ocean Territory
                                                                    </option>
                                                                    <option value="VG">British Virgin Islands</option>
                                                                    <option value="BN">Brunei</option>
                                                                    <option value="BG">Bulgaria</option>
                                                                    <option value="BF">Burkina Faso</option>
                                                                    <option value="BI">Burundi</option>
                                                                    <option value="KH">Cambodia</option>
                                                                    <option value="CM">Cameroon</option>
                                                                    <option value="CA">Canada</option>
                                                                    <option value="CV">Cape Verde</option>
                                                                    <option value="KY">Cayman Islands</option>
                                                                    <option value="CF">Central African Republic</option>
                                                                    <option value="TD">Chad</option>
                                                                    <option value="CL">Chile</option>
                                                                    <option value="CN">China</option>
                                                                    <option value="CX">Christmas Island</option>
                                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                                    <option value="CO">Colombia</option>
                                                                    <option value="KM">Comoros</option>
                                                                    <option value="CG">Congo (Brazzaville)</option>
                                                                    <option value="CD">Congo (Kinshasa)</option>
                                                                    <option value="CK">Cook Islands</option>
                                                                    <option value="CR">Costa Rica</option>
                                                                    <option value="HR">Croatia</option>
                                                                    <option value="CU">Cuba</option>
                                                                    <option value="CW">Cura&ccedil;ao</option>
                                                                    <option value="CY">Cyprus</option>
                                                                    <option value="CZ">Czech Republic</option>
                                                                    <option value="DK">Denmark</option>
                                                                    <option value="DJ">Djibouti</option>
                                                                    <option value="DM">Dominica</option>
                                                                    <option value="DO">Dominican Republic</option>
                                                                    <option value="EC">Ecuador</option>
                                                                    <option value="EG">Egypt</option>
                                                                    <option value="SV">El Salvador</option>
                                                                    <option value="GQ">Equatorial Guinea</option>
                                                                    <option value="ER">Eritrea</option>
                                                                    <option value="EE">Estonia</option>
                                                                    <option value="ET">Ethiopia</option>
                                                                    <option value="FK">Falkland Islands</option>
                                                                    <option value="FO">Faroe Islands</option>
                                                                    <option value="FJ">Fiji</option>
                                                                    <option value="FI">Finland</option>
                                                                    <option value="FR">France</option>
                                                                    <option value="GF">French Guiana</option>
                                                                    <option value="PF">French Polynesia</option>
                                                                    <option value="TF">French Southern Territories
                                                                    </option>
                                                                    <option value="GA">Gabon</option>
                                                                    <option value="GM">Gambia</option>
                                                                    <option value="GE">Georgia</option>
                                                                    <option value="DE">Germany</option>
                                                                    <option value="GH">Ghana</option>
                                                                    <option value="GI">Gibraltar</option>
                                                                    <option value="GR">Greece</option>
                                                                    <option value="GL">Greenland</option>
                                                                    <option value="GD">Grenada</option>
                                                                    <option value="GP">Guadeloupe</option>
                                                                    <option value="GU">Guam</option>
                                                                    <option value="GT">Guatemala</option>
                                                                    <option value="GG">Guernsey</option>
                                                                    <option value="GN">Guinea</option>
                                                                    <option value="GW">Guinea-Bissau</option>
                                                                    <option value="GY">Guyana</option>
                                                                    <option value="HT">Haiti</option>
                                                                    <option value="HM">Heard Island and McDonald
                                                                        Islands
                                                                    </option>
                                                                    <option value="HN">Honduras</option>
                                                                    <option value="HK">Hong Kong</option>
                                                                    <option value="HU">Hungary</option>
                                                                    <option value="IS">Iceland</option>
                                                                    <option value="IN">India</option>
                                                                    <option value="ID">Indonesia</option>
                                                                    <option value="IR">Iran</option>
                                                                    <option value="IQ">Iraq</option>
                                                                    <option value="IM">Isle of Man</option>
                                                                    <option value="IL">Israel</option>
                                                                    <option value="IT">Italy</option>
                                                                    <option value="CI">Ivory Coast</option>
                                                                    <option value="JM">Jamaica</option>
                                                                    <option value="JP">Japan</option>
                                                                    <option value="JE">Jersey</option>
                                                                    <option value="JO">Jordan</option>
                                                                    <option value="KZ">Kazakhstan</option>
                                                                    <option value="KE">Kenya</option>
                                                                    <option value="KI">Kiribati</option>
                                                                    <option value="KW">Kuwait</option>
                                                                    <option value="KG">Kyrgyzstan</option>
                                                                    <option value="LA">Laos</option>
                                                                    <option value="LV">Latvia</option>
                                                                    <option value="LB">Lebanon</option>
                                                                    <option value="LS">Lesotho</option>
                                                                    <option value="LR">Liberia</option>
                                                                    <option value="LY">Libya</option>
                                                                    <option value="LI">Liechtenstein</option>
                                                                    <option value="LT">Lithuania</option>
                                                                    <option value="LU">Luxembourg</option>
                                                                    <option value="MO">Macao S.A.R., China</option>
                                                                    <option value="MK">Macedonia</option>
                                                                    <option value="MG">Madagascar</option>
                                                                    <option value="MW">Malawi</option>
                                                                    <option value="MY">Malaysia</option>
                                                                    <option value="MV">Maldives</option>
                                                                    <option value="ML">Mali</option>
                                                                    <option value="MT">Malta</option>
                                                                    <option value="MH">Marshall Islands</option>
                                                                    <option value="MQ">Martinique</option>
                                                                    <option value="MR">Mauritania</option>
                                                                    <option value="MU">Mauritius</option>
                                                                    <option value="YT">Mayotte</option>
                                                                    <option value="MX">Mexico</option>
                                                                    <option value="FM">Micronesia</option>
                                                                    <option value="MD">Moldova</option>
                                                                    <option value="MC">Monaco</option>
                                                                    <option value="MN">Mongolia</option>
                                                                    <option value="ME">Montenegro</option>
                                                                    <option value="MS">Montserrat</option>
                                                                    <option value="MA">Morocco</option>
                                                                    <option value="MZ">Mozambique</option>
                                                                    <option value="MM">Myanmar</option>
                                                                    <option value="NA">Namibia</option>
                                                                    <option value="NR">Nauru</option>
                                                                    <option value="NP">Nepal</option>
                                                                    <option value="NL">Netherlands</option>
                                                                    <option value="NC">New Caledonia</option>
                                                                    <option value="NZ">New Zealand</option>
                                                                    <option value="NI">Nicaragua</option>
                                                                    <option value="NE">Niger</option>
                                                                    <option value="NG">Nigeria</option>
                                                                    <option value="NU">Niue</option>
                                                                    <option value="NF">Norfolk Island</option>
                                                                    <option value="KP">North Korea</option>
                                                                    <option value="MP">Northern Mariana Islands</option>
                                                                    <option value="NO">Norway</option>
                                                                    <option value="OM">Oman</option>
                                                                    <option value="PK">Pakistan</option>
                                                                    <option value="PS">Palestinian Territory</option>
                                                                    <option value="PA">Panama</option>
                                                                    <option value="PG">Papua New Guinea</option>
                                                                    <option value="PY">Paraguay</option>
                                                                    <option value="PE">Peru</option>
                                                                    <option value="PH">Philippines</option>
                                                                    <option value="PN">Pitcairn</option>
                                                                    <option value="PL">Poland</option>
                                                                    <option value="PT">Portugal</option>
                                                                    <option value="PR">Puerto Rico</option>
                                                                    <option value="QA">Qatar</option>
                                                                    <option value="IE">Republic of Ireland</option>
                                                                    <option value="RE">Reunion</option>
                                                                    <option value="RO">Romania</option>
                                                                    <option value="RU">Russia</option>
                                                                    <option value="RW">Rwanda</option>
                                                                    <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                                                    <option value="BL">Saint Barth&eacute;lemy</option>
                                                                    <option value="SH">Saint Helena</option>
                                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                                    <option value="LC">Saint Lucia</option>
                                                                    <option value="SX">Saint Martin (Dutch part)
                                                                    </option>
                                                                    <option value="MF">Saint Martin (French part)
                                                                    </option>
                                                                    <option value="PM">Saint Pierre and Miquelon
                                                                    </option>
                                                                    <option value="VC">Saint Vincent and the
                                                                        Grenadines
                                                                    </option>
                                                                    <option value="WS">Samoa</option>
                                                                    <option value="SM">San Marino</option>
                                                                    <option value="SA">Saudi Arabia</option>
                                                                    <option value="SN">Senegal</option>
                                                                    <option value="RS">Serbia</option>
                                                                    <option value="SC">Seychelles</option>
                                                                    <option value="SL">Sierra Leone</option>
                                                                    <option value="SG">Singapore</option>
                                                                    <option value="SK">Slovakia</option>
                                                                    <option value="SI">Slovenia</option>
                                                                    <option value="SB">Solomon Islands</option>
                                                                    <option value="SO">Somalia</option>
                                                                    <option value="ZA">South Africa</option>
                                                                    <option value="GS">South Georgia/Sandwich Islands
                                                                    </option>
                                                                    <option value="KR">South Korea</option>
                                                                    <option value="SS">South Sudan</option>
                                                                    <option value="ES">Spain</option>
                                                                    <option value="LK">Sri Lanka</option>
                                                                    <option value="SD">Sudan</option>
                                                                    <option value="SR">Suriname</option>
                                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                                    <option value="SZ">Swaziland</option>
                                                                    <option value="SE">Sweden</option>
                                                                    <option value="CH">Switzerland</option>
                                                                    <option value="SY">Syria</option>
                                                                    <option value="TW">Taiwan</option>
                                                                    <option value="TJ">Tajikistan</option>
                                                                    <option value="TZ">Tanzania</option>
                                                                    <option value="TH">Thailand</option>
                                                                    <option value="TL">Timor-Leste</option>
                                                                    <option value="TG">Togo</option>
                                                                    <option value="TK">Tokelau</option>
                                                                    <option value="TO">Tonga</option>
                                                                    <option value="TT">Trinidad and Tobago</option>
                                                                    <option value="TN">Tunisia</option>
                                                                    <option value="TR">Turkey</option>
                                                                    <option value="TM">Turkmenistan</option>
                                                                    <option value="TC">Turks and Caicos Islands</option>
                                                                    <option value="TV">Tuvalu</option>
                                                                    <option value="UG">Uganda</option>
                                                                    <option value="UA">Ukraine</option>
                                                                    <option value="AE">United Arab Emirates</option>
                                                                    <option value="GB">United Kingdom (UK)</option>
                                                                    <option value="US">United States (US)</option>
                                                                    <option value="UM">United States (US) Minor Outlying
                                                                        Islands
                                                                    </option>
                                                                    <option value="VI">United States (US) Virgin
                                                                        Islands
                                                                    </option>
                                                                    <option value="UY">Uruguay</option>
                                                                    <option value="UZ">Uzbekistan</option>
                                                                    <option value="VU">Vanuatu</option>
                                                                    <option value="VA">Vatican</option>
                                                                    <option value="VE">Venezuela</option>
                                                                    <option value="VN" selected='selected'>Vietnam
                                                                    </option>
                                                                    <option value="WF">Wallis and Futuna</option>
                                                                    <option value="EH">Western Sahara</option>
                                                                    <option value="YE">Yemen</option>
                                                                    <option value="ZM">Zambia</option>
                                                                    <option value="ZW">Zimbabwe</option>
                                                                </select>
                                                            </p>
                                                            <p class="form-row form-row-wide"
                                                               id="calc_shipping_state_field">
                                                                <input type="hidden" name="calc_shipping_state" id="calc_shipping_state"
                                                                       placeholder="State / county"/>
                                                            </p>
                                                            <p class="form-row form-row-wide"
                                                               id="calc_shipping_postcode_field">
                                                                <input type="text" class="input-text" value="" placeholder="Postcode / ZIP"
                                                                       name="calc_shipping_postcode" id="calc_shipping_postcode"/>
                                                            </p>
                                                            <p>
                                                                <button type="submit" name="calc_shipping" value="1" class="button">Update Totals
                                                                </button>
                                                            </p>
                                                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="1d9dc3b6d5"/>
                                                            <input type="hidden" name="_wp_http_referer" value="/cart/"/></section>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th> @lang('sites.carts.total') </th>
                                                <td data-title="Total">
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>44.80</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="https://goatstee.com/checkout/" class="checkout-button button alt wc-forward">
                                                @lang('sites.carts.checkout')
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
