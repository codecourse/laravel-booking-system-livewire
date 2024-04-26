import { easepick, LockPlugin } from "@easepick/bundle";
import style from '@easepick/bundle/dist/index.css?url'

export default function (Alpine) {
    Alpine.directive('picker', (el, { expression }, { evaluate }) => {
        const options = evaluate(expression)

        const picker = new easepick.create({
            element: el,
            readonly: true,
            zIndex: 50,
            date: options.date,
            css: [
                style
            ],
            plugins: [
                LockPlugin
            ],
            LockPlugin: {
                minDate: new Date(),
                filter (date) {
                    return !options.availability.find(a => a.date === date.format('YYYY-MM-DD'))
                }
            }
        })
    })
}
