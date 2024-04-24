# Laravel-Omise For Laravel9+

[![Total Downloads](https://poser.pugx.org/wall0ck/omise/downloads)](https://packagist.org/packages/wall0ck/omise)
[![Monthly Downloads](https://poser.pugx.org/wall0ck/omise/d/monthly)](https://packagist.org/packages/wall0ck/omise)
[![Daily Downloads](https://poser.pugx.org/wall0ck/omise/d/daily)](https://packagist.org/packages/wall0ck/omise)
[![License](https://poser.pugx.org/wall0ck/omise/license)](https://packagist.org/packages/wall0ck/omise)

# Note

เวอร์ชั่นเก่ามันติดตั้งไม่ได้แล้ว เลยอัพใหม่ให้รองรับ Laravel v9.0 ขึ้นไป

- รองรับการ สร้าง OmiseCharge , OmiseSource
- เพิ่ม retrieve \*ใหม่

# Docs

[เริ่มต้นใช้งานของ omise](https://www.omise.co/th/docs/thailand)

[ตัวอย่างโค้ด](https://github.com/0x01code/Laravel-Omise-Example)

[ต้นฉบับโค้ด 0x01code](https://github.com/0x01code/Laravel-Omise/)

# Support

<table>
      <tr>
         <th>Laravel</th>
         <th>9.0+</th>
      </tr>
</table>

# วิธีใช้งาน

โหลดผ่าน composer

```
composer require wall0ck/omise
```

นำไฟล์ config มาไว้ที่โปรเจค

```
php artisan vendor:publish --tag=config
```

กำหนด .env

```
OMISE_PUBLIC_KEY=
OMISE_SECRET_KEY=
```

สร้าง Source [อ่านเพิ่มเติม](https://www.omise.co/th/omise-js/thailand#createsource)

```
$response = OmiseSource::create([
   'amount' => 12345,
   'currency' => 'THB',
   'type' => 'truemoney',
   'phone_number' => '0123456789',
]);
dd($response);
```

สร้าง Charge [อ่านเพิ่มเติม](https://www.omise.co/th/charges-api/thailand)

```
$response = OmiseCharge::create([
   'amount' => 12345,
   'currency' => 'THB',
   'return_uri' => 'http://example.com/orders/345678/complete',
   'source' => 'src_*****',
]);
dd($response);
```

เช็ค Payment Status [อ่านเพิ่มเติม](https://docs.opn.ooo/charges-api#retrieve)

```
 $sourceId = $request->input('source_id');
        $charge = OmiseCharge::retrieve($sourceId);
        $response = response()->json(['status' => $charge['status']]);
dd($response);
```
