import Utils from './utils.js'

const elements = {
    header: {
        self: document.querySelector('header'),
        get loopWords() { return this.self.querySelector('.title .loop-words') }
    }
}

window.addEventListener('load', async () => {

    await loopWordsEffect(elements.header.loopWords)

})

async function loopWordsEffect(target) {
    
    const words = target.dataset.words.split(',').map(w => w.trim())
    const sizes = []
    let index = 0,
        backupTxtColor = getComputedStyle(target).getPropertyValue('color'),
        timeInterval = 3000,
        timeTransition = 300

    while(sizes.length < words.length){
        
        target.innerHTML = words[sizes.length]
        sizes.push(target.clientWidth)
        
    }

    target.innerHTML = words[0]
    target.style.width = `${sizes[0]}px`

    setInterval(() => {
        
        if(index >= words.length) index = 0

        setTimeout(() => target.style.color = '#00000000', timeInterval - timeTransition)
        setTimeout(() => target.style.color = backupTxtColor, timeInterval + timeTransition)

        target.style.width = `${sizes[index]}px`
        target.innerHTML = words[index]

        index++

    }, timeInterval)

}