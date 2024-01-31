import Utils from './utils.js'

export default class FileUpload {

    constructor(file, uploaderPath, inputName = 'file', chunkSize = 1000000) {

        this.file = file
        this.uploaderPath = uploaderPath
        this.chunkSize = chunkSize
        this.inputName = inputName
        
    }
    
    async upload(data = {}) {
        
        const { file, uploaderPath, inputName, chunkSize, onProgress, onUploaded } = data

        this.file = file ? file : this.file
        this.uploaderPath = uploaderPath ? uploaderPath : this.uploaderPath
        this.chunkSize = chunkSize ? chunkSize : this.chunkSize
        this.inputName = inputName ? inputName : this.inputName

        let chunks = [],
            start = 0,
            end = this.chunkSize      

        while(start < this.file.size){

            chunks.push({
                blob: this.file.slice(start, end),
                percentLoaded: 0
            })

            start = end
            end = start + this.chunkSize

        }

        if(chunks.length > 0){

            for(let [i, c] of chunks.entries()) {

                const data = new FormData

                data.append(this.inputName, c.blob, this.file.name)
                data.append('chunksLength', chunks.length)
    
                const req = await fetch(this.uploaderPath, {
                    method: 'POST',
                    body: data
                })

                if(req.status !== 200) break

                const contentLength = req.headers.get('Content-Length')
                const total = contentLength ? parseInt(contentLength, 10) : 0

                let loaded = 0

                const reader = req.body.getReader()

                while(true){

                    const { done, value } = await reader.read()

                    if(done){

                        if(typeof onProgress == 'function'){

                            const percentage = Utils.minmax(chunks.reduce((v, c) => v + c.percentLoaded, 0) / chunks.length, 0, 100)

                            onProgress(percentage)

                        }

                        break
                        
                    }

                    loaded += value.length || 0;
                    c.percentLoaded = (loaded / total) * 100
                    
                }
    
            }

            if(typeof onUploaded == 'function' && chunks.every(c => c.percentLoaded == 100)) onUploaded()

        }

    }

}