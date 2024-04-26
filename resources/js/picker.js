import { easepick} from "@easepick/bundle";
import style from '@easepick/bundle/dist/index.css?url'

export default function (Alpine) {
    Alpine.directive('picker', (el) => {
        const picker = new easepick.create({
            element: el,
            readonly: true,
            zIndex: 50,
            css: [
                style
            ]
        })
    })
}
