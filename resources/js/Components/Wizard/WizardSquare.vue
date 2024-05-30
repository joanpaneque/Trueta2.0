<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    color: {
        type: String,
        default: ''
    },
    text: {
        type: String,
        default: ''
    }
})


function getReadableTextColor(backgroundColor) {
    function hexToRgb(hex) {
        hex = hex.replace(/^#/, '');
        if (hex.length === 3) {
            hex = hex.split('').map(char => char + char).join('');
        }
        const num = parseInt(hex, 16);
        return {
            r: (num >> 16) & 255,
            g: (num >> 8) & 255,
            b: num & 255
        };
    }

    function rgbToHex(r, g, b) {
        return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1)}`;
    }

    function luminance(r, g, b) {
        const a = [r, g, b].map(v => {
            v /= 255;
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return a[0] * 0.1126 + a[1] * 0.7152 + a[2] * 0.0722;
    }

    function getContrastingColor(r, g, b) {
        const lum = luminance(r, g, b);
        return lum > 0.5 ? '#000000' : '#FFFFFF';
    }

    const bgColorRgb = hexToRgb(backgroundColor);

    const bgColorLuminance = luminance(bgColorRgb.r, bgColorRgb.g, bgColorRgb.b);

    let textColor;
    if (bgColorLuminance > 0.5) {
        textColor = rgbToHex(
            Math.max(0, bgColorRgb.r - 150),
            Math.max(0, bgColorRgb.g - 150),
            Math.max(0, bgColorRgb.b - 150)
        );
    } else {
        textColor = rgbToHex(
            Math.min(255, bgColorRgb.r + 150),
            Math.min(255, bgColorRgb.g + 150),
            Math.min(255, bgColorRgb.b + 150)
        );
    }

    const textColorRgb = hexToRgb(textColor);
    const textColorLuminance = luminance(textColorRgb.r, textColorRgb.g, textColorRgb.b);

    if (textColorLuminance < 0.4 || textColorLuminance > 0.8) {
        textColor = getContrastingColor(bgColorRgb.r, bgColorRgb.g, bgColorRgb.b);
    }

    return textColor;
}


</script>

<template>
    <div class="wizard-square-container" :style="{ backgroundColor: color, color: getReadableTextColor(color) }">
        <p>{{ text }}</p>
    </div>
</template>

<style scoped>
.wizard-square-container {
  align-items: center;
  padding: 15px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 15px;
  text-transform: uppercase;
  text-align: center;
  font-size: 1.75em;
  word-break: break-word;
  user-select: none;
  opacity: 0.8;
  transition: 0.3s;
  min-height: 250px;
  width: 100%;
}
</style>