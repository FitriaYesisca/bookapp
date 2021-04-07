# 4.8.19 Example Object

## 4.8.19.1 Fixed Fields
| Nama Field  |   Tipe  | Deskripsi |
| ----------- |  ------ | ----------- |
|   summary   | `string`| Misalnya deskripsi singkat. |
| description | `string`| Misalnya deskripsi yang panjang. Untuk memperkaya representasi teks dapat menggunakan [CommonMark syntax](https://spec.commonmark.org/)  |
|value        | any     | Berupa kalimat literal (bebas konteks). Value dan externalValue sama-sama bersifat eksklusif. Tidak dapat direpresentasikan menggunakan JSON dan YAML, melainkan menggunakan string. |
|externalValue|`externalValue `| Mirip dengan value namun merujuk pada sebuah URl. Dalam implementasinya harus mengikuti aturan [Relative References](http://spec.openapis.org/oas/v3.1.0#relativeReferencesURI)|

Object example diharapkan kompatibel dengan tipe skema yang terkait. Hal ini dijelaskan lebih lanjut dalam [Specification Extensions](http://spec.openapis.org/oas/v3.1.0#specificationExtensions)

## 4.8.19.2 Contoh Example Object
 #### Dalam request body :
```
requestBody:
  content:
    'application/json':
      schema:
        $ref: '#/components/schemas/Address'
      examples: 
        foo:
          summary: A foo example
          value: {"foo": "bar"}
        bar:
          summary: A bar example
          value: {"bar": "baz"}
    'application/xml':
      examples: 
        xmlExample:
          summary: This is an example in XML
          externalValue: 'https://example.org/examples/address-example.xml'
    'text/plain':
      examples:
        textExample: 
          summary: This is a text example
          externalValue: 'https://foo.bar/examples/address-example.txt'
```

#### Dalam parameter :
```
parameters:
  - name: 'zipCode'
    in: 'query'
    schema:
      type: 'string'
      format: 'zip-code'
    examples:
      zip-example: 
        $ref: '#/components/examples/zip-example'
```

#### Dalam response :
```
responses:
  '200':
    description: your car appointment has been booked
    content: 
      application/json:
        schema:
          $ref: '#/components/schemas/SuccessResponse'
        examples:
          confirmation-success:
            $ref: '#/components/examples/confirmation-success'
```
