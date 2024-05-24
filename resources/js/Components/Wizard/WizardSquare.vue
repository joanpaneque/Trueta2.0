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


// create a function that recieves a color and generates a good readable text matching color
// if the background is orange, the text should be darker orange or lighter orange depending on the background
function getReadableTextColor(backgroundColor) {
    // Helper function to convert hex color to RGB
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

    // Helper function to convert RGB to hex
    function rgbToHex(r, g, b) {
        return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1)}`;
    }

    // Helper function to calculate luminance
    function luminance(r, g, b) {
        const a = [r, g, b].map(v => {
            v /= 255;
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return a[0] * 0.1126 + a[1] * 0.7152 + a[2] * 0.0722;
    }

    // Helper function to get contrasting color (black or white)
    function getContrastingColor(r, g, b) {
        const lum = luminance(r, g, b);
        return lum > 0.5 ? '#000000' : '#FFFFFF';
    }

    // Convert background color to RGB
    const bgColorRgb = hexToRgb(backgroundColor);

    // Calculate the luminance of the background color
    const bgColorLuminance = luminance(bgColorRgb.r, bgColorRgb.g, bgColorRgb.b);

    // Adjust text color based on the background luminance
    let textColor;
    if (bgColorLuminance > 0.5) {
        // Darken the background color more for text if background is light
        textColor = rgbToHex(
            Math.max(0, bgColorRgb.r - 150),
            Math.max(0, bgColorRgb.g - 150),
            Math.max(0, bgColorRgb.b - 150)
        );
    } else {
        // Lighten the background color more for text if background is dark
        textColor = rgbToHex(
            Math.min(255, bgColorRgb.r + 150),
            Math.min(255, bgColorRgb.g + 150),
            Math.min(255, bgColorRgb.b + 150)
        );
    }

    // Ensure the text color contrasts sufficiently with the background
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