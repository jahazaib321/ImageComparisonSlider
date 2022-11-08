define(["uiComponent", "jquery", "beforeEffectslider"], function (
    Component,
    $,
    beforeEffectslider
) {
    "use strict";
    return Component.extend({
        image: null,
        initialize: function (config, node) {
            console.log("config", config);
            const Vertical = config.Vertical;
            const BeforeImage = config.BeforeImage;
            const BeforeImageMobile = config.BeforeImageMobile;
            const BeforeAlt = config.BeforeAlt;
            const AfterImage = config.AfterImage;
            const AfterImageMobile = config.AfterImageMobile;
            const AftereAlt = config.AftereAlt;
            const DragFrom = config.DragFrom;
            const MaxDrag = config.MaxDrag;
            const MinDrag = config.MinDrag;
            const DragIcon = config.DragIcon;
            const IconSize = config.IconSize;
            const IconColor = config.IconColor;
            const LineColor = config.LineColor;
            const ButtonRaduis = config.ButtonRaduis;
            const Cursor = config.Cursor;
            const Buttons = config.Buttons;
            const ButtonsText = config.ButtonsText;
            const after = config.ButtonsText.after;
            const before = config.ButtonsText.before;
            this.ImageCompresion(
                Vertical,
                BeforeImage,
                BeforeImageMobile,
                BeforeAlt,
                AfterImage,
                AfterImageMobile,
                AftereAlt,
                DragFrom,
                MaxDrag,
                MinDrag,
                DragIcon,
                IconSize,
                IconColor,
                LineColor,
                ButtonRaduis,
                Cursor,
                Buttons,
                ButtonsText,
                after,
                before
            );
        },

        ImageCompresion: function (
            Vertical,
            BeforeImage,
            BeforeImageMobile,
            BeforeAlt,
            AfterImage,
            AfterImageMobile,
            AftereAlt,
            DragFrom,
            MaxDrag,
            MinDrag,
            DragIcon,
            IconSize,
            IconColor,
            LineColor,
            ButtonRaduis,
            Cursor,
            Buttons,
            ButtonsText,
            after,
            before
        ) {
            beforeEffectslider({
                Selector: "#beforeEffectslider", // Element that the slider will be build in
                Vertical: Vertical, // this Slider is Vertical! (false is default value)
                BeforeImage: BeforeImage, // Before Image
                BeforeImageMobile: BeforeImageMobile, //Image for mobile
                BeforeAlt: BeforeAlt, // Before Image Alt
                AfterImage: AfterImage, // After Image
                AfterImageMobile: AfterImageMobile, //After Image Mobile
                AftereAlt: AftereAlt, // After Image Alt
                DragFrom: DragFrom, // Percent % of before Image
                MaxDrag: MaxDrag, //Max drag from right or bottom if vertical
                MinDrag: MinDrag, //Min drag from left or top if vertical
                DragIcon: DragIcon, //no html, only codes
                IconSize: IconSize, //Icon size
                IconColor: IconColor, //Icon Color
                LineColor: LineColor, //Line Color
                //   ButtonGradient: ButtonGradient, // Line Button gradient (keep same color for no gradient)
                //   ButtonBorder: ButtonBorder, //Line Button Border Color
                ButtonRaduis: ButtonRaduis, // Line Button Raduis
                Cursor: Cursor, // Cursor style on button hover, for more: https://developer.mozilla.org/fr/docs/Web/CSS/cursor
                Buttons: Buttons, // Show before and after buttons ?
                ButtonsText: {
                    //After Before Buttons Texts
                    after: after,
                    before: before,
                },
                Border: {
                    // Border properties
                    color: "black",
                    width: 0, // 0 for no border
                    style: "none",
                },
                //   callbackBefore: () => alert("before build"), //Callback Before building slider
                //   callbackAfter: () => alert("after build"), //Callback After building slider
            });
        },
    });
});
