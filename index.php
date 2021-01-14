<?php
require_once('./_private/bundle.php');
require_once(HEADER);
?>
<div id="shortlink">
    <form>
        <input id="url" type="text" name="url" value="URL">
        <img alt="" action="check" src="<?= HOME . '/assets/images/check.svg' ?>" />
    </form>
    <div>
        <img alt="" action="check" src="<?= HOME . '/assets/images/reload.svg' ?>" />
    </div>
</div>
<div id="plan">
    <h3>Update now to get more links</h3>
    <div id="plan-slide">
        <div class="plan-item">
            <div>
                <h3>Free</h3>
                <h1>0 $</h1>
                <h3>10 links</h3>
            </div>
            <div>
                <img alt="" src="<?= HOME . '/assets/images/cancel.svg' ?>" />
                <h3> Bank card</h3>
                <p>payment detail</p>
                <form>
                    <input type="text" name="cardname" placeholder="card holder name" autocomplete="on" />
                    <input type="text" name="cardname" placeholder="card number" autocomplete="on" />
                    <div>
                        <input type="number" name="date" placeholder="date" autocomplete="on" />
                        <input type="number" name="cvv" placeholder="cvv" autocomplete="on" />
                    </div>
                </form>
                <button>Next</button>
            </div>

        </div>

        <div class="plan-item">
            <div>
                <h3>Free</h3>
                <h1>0 $</h1>
                <h3>10 links</h3>
            </div>
            <div>
                <img alt="" src="<?= HOME . '/assets/images/cancel.svg' ?>" />
                <h3> Bank card</h3>
                <p>payment detail</p>
                <form>
                    <input type="text" name="cardname" placeholder="card holder name" />
                    <input type="text" name="cardname" placeholder="card number" />
                    <div>
                        <input type="number" name="date" placeholder="date" />
                        <input type="number" name="cvv" placeholder="cvv" />
                    </div>
                </form>
                <button>Next</button>
            </div>

        </div>
        <div class="plan-item">
            <div>
                <h3>Free</h3>
                <h1>0 $</h1>
                <h3>10 links</h3>
            </div>
            <div>
                <img alt="" src="<?= HOME . '/assets/images/cancel.svg' ?>" />
                <h3> Bank card</h3>
                <p>payment detail</p>
                <form>
                    <input type="text" name="cardname" placeholder="card holder name" />
                    <input type="text" name="cardname" placeholder="card number" />
                    <div>
                        <input type="number" name="date" placeholder="date" />
                        <input type="number" name="cvv" placeholder="cvv" />
                    </div>
                </form>
                <button>Next</button>
            </div>
        </div>



    </div>
</div>
</div>

<?php
require_once(FOOTER);
